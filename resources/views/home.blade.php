@extends('layouts.main')

@section('leftArea')
<div class="row justify-content-center no-gutters mt-5 mb-5">

    <div class="col-7 col-sm-6 col-md-10 col-lg-8 col=xl-7 m-auto p-0">
        <div id="stack_1" class="cards stack_switch">
            <p>stack_1</p>
        </div>

        <div id="stack_2" class="cards stack_switch mt-4">
            <p>stack_2</p>
        </div>

        <div id="stack_3" class="cards stack_switch mt-4">
            <p>stack_3</p>
        </div>
    </div>

</div>
@endsection

@section('rightArea')

<!-- Меню настроек -->
<div class="row no-gutters p-0 text-center" id="menuOptions">
    <div class="search col-12 col-sm-6 col-xl-5 order-12 order-sm-4 order-xl-1">
        <select id="fastSelectOriginal" size="1" class="fastSelect form-control rounded-0">
            <option class="selectElementsOriginal" value="Select">Select</option>
        </select>
    
        <select id="fastSelectTranslation" size="1" class="fastSelect form-control rounded-0" style="display: none">
            <option class="selectElementsTranslation" value="Select">Выбрать</option>
        </select>
    </div>

    <div id="front_side_activation" class="set_active_side col-6 col-sm-3 col-xl-2 order-4 order-sm-5 order-xl-2">
        <a class="top_menu_btn">FRONT SIDE</a>
    </div>

    <div id="back_side_activation" class="set_active_side col-6 col-sm-3 col-xl-2 order-5 order-sm-6  order-xl-3">
        <a class="top_menu_btn">BACK SIDE</a>
    </div>

    <div id="addCard" class="col-4 col-xl-1 order-1 order-xl-4">
        <a class="top_menu_btn">ADD</a>
    </div>

    <div id="editCard" class="col-4 col-xl-1 order-2 order-xl-5">
        <a class="top_menu_btn">EDIT</a>
    </div>

    <div id="deleteCard" class="col-4 col-xl-1 order-3 order-xl-6">
        <a class="top_menu_btn">DELETE</a>
    </div>

</div>

<div id="workArea">
    <div id="back" class="navigation">
        <p>BACK</p>
    </div>
    <div id="active_stack" class="cards">

        <div id="move-card-up" class="move"></div>
        <div id="move-card-down" class="move"></div>

        <div id="original_side">
            <div class="wrap_inf_card">
                <div id="original_div">
                    <p id="original"></p>
                </div>
                <div id="original_comment_div">
                    <p id="original_comment"></p>
                </div>
            </div>
        </div>
        <div id="translation_side" style="display: none">
            <div class="wrap_inf_card">
                <div id="translation_div">
                    <p id="translation"></p>
                </div>
                <div id="translation_comment_div">
                    <p id="translation_comment"></p>
                </div>
            </div>
        </div>
    </div>

    <div id="form_add_card" class="cards">
        <div id="orig-part-form">
            <div class="input-new-card flex-form-part"><label for="input-orig">Оriginal: </label>
                <input type="text" id="input-orig" name="input-orig" placeholder="required" maxlength="30">
            </div>
            <div class="input-new-card">
                <textarea id="input-orig-comment" name="input-orig-comment" placeholder="Comment (optional)" rows="2" maxlength="80"></textarea>
            </div>
        </div>
        <div id="transl-part-form">
            <div class="input-new-card flex-form-part"><label for="input-transl">Translation: </label>
                <input type="text" id="input-transl" name="input-transl" placeholder="required" maxlength="30">
            </div>
            <div class="input-new-card">
                <textarea id="input-transl-comment" name="input-transl-comment" placeholder="Comment (optional)" rows="2" maxlength="80"></textarea>
            </div>
        </div>
        <div class="input-new-card" id="add-select-stack-div">
            <p style="margin-bottom: 5px;">Choose a stack</p>
            <select id="select-new-card-stack" size="1" name="select-new-card-stack">
                <option value="1">New word</option>
                <option value="2">To study</option>
                <option value="3">Already know</option>
            </select>
        </div>
        <button class="form-button add-or-edit" type="button" value="Save">
            Save</button>
    </div>
    <div id="forward" class="navigation">
        <p>FORWARD</p>
    </div>
</div>

@endsection

@section('scripts')

<script src='js/getCards.js'></script>
<script src='js/stackSwitch.js'></script>
<script src='js/showCard.js'></script>
<script src='js/settings.js'></script>
<script src='js/addCard.js'></script>
<script src='js/editCard.js'></script>
<script src='js/deleteCard.js'></script>
<script src='js/fastSelectCard.js'></script>
<script src='js/moveCard.js'></script>

@endsection