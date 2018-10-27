$(document).ready(function(){
    $beginDate = $('#pods-form-ui-pods-meta-event-begin-date');
    $endDate = $('#pods-form-ui-pods-meta-event-end-date');
    endEmpty = true;

    if($endDate.val()) endEmpty = false;

    if(endEmpty){
        $beginDate.on('focusout blur change', function(){
            $endDate.val($beginDate.val());
        });
    }
});