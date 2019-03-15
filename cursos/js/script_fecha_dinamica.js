                $(document).ready(function() {
                  var dynamic_form2 =  $("#dynamic_form2").dynamicForm("#dynamic_form2","#plus5_2", "#minus5_2", {
                    limit:10,
                    formPrefix : "dynamic_form2",
                    normalizeFullForm : false
                });

                  dynamic_form2.inject([{fecha_curso: 'Hemant',quantity: '123',remarks: 'testing remark'},{fecha_curso: 'Harshal',quantity: '123',remarks: 'testing remark'}]);

                $("#dynamic_form2 #minus5_2").on('click', function(){
                  var initDynamicId2 = $(this).closest('#dynamic_form2').parent().find("[id^='dynamic_form2']").length;
                  if (initDynamicId2 === 2) {
                    $(this).closest('#dynamic_form2').next().find('#minus5_2').hide();
                  }
                  $(this).closest('#dynamic_form2').remove();
                });

                $('form2').on('submit2', function(event){
                    var values = {};
                $.each($('form2').serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                console.log(values) 
                    event.preventDefault();
                  })
                });