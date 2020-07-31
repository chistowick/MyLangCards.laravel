<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // для работы с Request
use App\Card; // Использовать пространство имен модели Book
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\False_;

class AjaxController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 
     * @return void;
     * 
     * Prints array of cards - JSON.
     */
    public function getCards()
    {

        // Получаем ID аутентифицированного пользователя
        $userId = Auth::id();

        // Получаем карточки, принадлежащие пользователю
        $cards = Card::select(
            'id',
            'original',
            'originalComment',
            'translation',
            'translationComment',
            'stack'
        )
            ->where('login', $userId)
            ->get();

        // Converts the array to JSON and returns it to js-client
        echo json_encode($cards);

        return;
    }

    /**
     * 
     * @return void;
     * 
     * Saves a new card. Prints id of new card.
     */
    public function addCard(Request $request)
    {
        $level = Auth::user()->level;
        $max_level = Auth::user()->max_level;

        // Убеждаемся, что максимум карточек для пользователя не достигнут
        if ($level < $max_level) {

            // Получаем ID аутентифицированного пользователя
            $userId = Auth::id();

            $newCard = Card::create(
                [
                    'original'              => $request->original,
                    'originalComment'       => $request->originalComment,
                    'translation'           => $request->translation,
                    'translationComment'    => $request->translationComment,
                    'stack'                 => $request->stack,
                    'login'                 => $userId,
                ]
            );

            // Отправляем скрипту JS id созданной карточки для создания карточки на месте
            echo json_encode($newCard->id);

            // Добавляем "1" к счетчику заполнения базы
            Auth::user()->level = ($level + 1);
            Auth::user()->save();
        } else {

            // Сообщаем клиенту, что для него достигнуто максимальное количество карточек 
            echo json_encode(['overload']);
        }

        return;
    }

    /**
     *
     * Edits the card. Prints status.
     *
     * @return void;
     * 
     **/
    public function editCard(Request $request)
    {
        // Получаем ID аутентифицированного пользователя
        $userId = Auth::id();

        // Извлекаем ID редактируемой карточки, из клиентского запроса
        $editedCardId = $request->id;

        //Получаем модель карточки, которую хотим отредактировать
        $editedCard = Card::find($editedCardId);

        // Если ID аутентифицированного пользователя совпадает с login владельца карточки, позволяем редактирование
        if ($editedCard->login == $userId) {

            // Изменяем карточку
            $editedCard->original           = $request->original;
            $editedCard->originalComment    = $request->originalComment;
            $editedCard->translation        = $request->translation;
            $editedCard->translationComment = $request->translationComment;
            $editedCard->stack              = $request->stack;

            // Сохраняем изменения в базу и возвращаем статус операции клиенту JS
            if ($editedCard->save()) {
                echo json_encode([TRUE]);
            } else {
                echo json_encode([FALSE]);
            }
        }

        return;
    }

    /**
     *
     * Deletes the card by id. Prints status.
     *
     * @return void;
     * 
     **/
    public function deleteCard(Request $request)
    {
        $level = Auth::user()->level;

        // Убеждаемся, что у пользователя есть карточки
        if ($level > 0) {

            // Получаем ID аутентифицированного пользователя
            $userId = Auth::id();

            // Извлекаем ID удаляемой карточки, из клиентского запроса
            $deletedCardId = $request->id;

            //Получаем модель карточки, которую хотим удалить
            $deletedCard = Card::find($deletedCardId);

            // Если ID аутентифицированного пользователя совпадает с login владельца карточки, позволяем удаление
            if ($deletedCard->login == $userId) {

                // Удаляем модель по id, переданному от JS клиента и возвращаем статус операции
                // TODO Проверить тип данных, в котором TRUE/FALSE придет в JS
                if (Card::destroy($deletedCardId)) {
                    echo json_encode([TRUE]);
                } else {
                    echo json_encode([FALSE]);
                }
            }

            // Уменьшаем счетчик карточек пользователя на "1"
            Auth::user()->level = ($level - 1);
            Auth::user()->save();
        }

        return;
    }

    /**
     *
     * Moves the card by id from old stack to new stack. Prints status.
     *
     * @return void;
     * 
     **/
    public function moveCard(Request $request)
    {
        // Получаем ID аутентифицированного пользователя
        $userId = Auth::id();

        // Извлекаем ID перемещаемой карточки, из клиентского запроса
        $movedCardId = $request->id;

        // Получаем модель карточки, которую хотим отредактировать
        $movedCard = Card::find($movedCardId);

        // Если ID аутентифицированного пользователя совпадает с login владельца карточки, позволяем перемещение
        if ($movedCard->login == $userId) {

            // Изменяем стек карточки
            $movedCard->stack = $request->stack;

            // Сохраняем изменения в базу и возвращаем статус операции клиенту JS
            // TODO Проверить тип данных, в котором TRUE/FALSE придет в JS
            if ($movedCard->save()) {
                echo json_encode([TRUE]);
            } else {
                echo json_encode([FALSE]);
            }
        }

        return;
    }
}
