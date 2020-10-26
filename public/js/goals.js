$(document).ready(function(){
    var GoalsObjects = {
        contacts_form       : ".questions .wrapper form",
        header_call_req     : "#callbackPopup .popup-cnt form",
        one_click_order_form: "#oneClick .popup-cnt form"
    }
    if($(GoalsObjects.contacts_form).length !== 0){
        $(GoalsObjects.contacts_form).on('submit', function (){
            yaCounter67339396.reachGoal('question');
        });
    }
    if($(GoalsObjects.header_call_req).length !== 0){
        $("#callbackPopup .popup-cnt form").on('submit', function (){
            yaCounter67339396.reachGoal('call');
        });
    }
    if($(GoalsObjects.one_click_order_form).length !== 0){
        $(GoalsObjects.one_click_order_form).on('submit', function (){
            yaCounter67339396.reachGoal('click');
        });
    }
});
