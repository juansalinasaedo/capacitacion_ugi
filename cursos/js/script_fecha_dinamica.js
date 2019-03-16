$(function(){

  var dynamic_form_relator =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", { limit:10, formPrefix : "dynamic_form", normalizeFullForm : false});
  dynamic_form_relator.inject([{p_name: 'Nombre relator',}]);
  
  var dynamic_form_date =  $("#dform_date").dynamicForm("#dform_date","#plus5_2", "#minus5_2", {limit:10, formPrefix : "dform_date", normalizeFullForm : false});
  dynamic_form_date.inject([{fecha_curso: 'Fecha del curso.'},]);
  
  $("#dynamic_form #minus5").on('click', function(){
    var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
    if (initDynamicId === 2) $(this).closest('#dynamic_form').next().find('#minus5').hide();    
    $(this).closest('#dynamic_form').remove(); 
  
  });
  
  $("#dform_date #minus5_2").on('click', function(){
    var initDynamicId2 = $(this).closest('#dform_date').parent().find("[id^='dform_date']").length;
    if (initDynamicId2 === 2) $(this).closest('#dform_date').next().find('#minus5_2').hide();
    $(this).closest('#dform_date').remove();
  });

  $('form').on('submit', function(event){
    var values = {};
    $.each($('form').serializeArray(), function(i, field) {
      values[field.name] = field.value;
    });
  })

})