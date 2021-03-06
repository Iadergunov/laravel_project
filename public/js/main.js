$(document).ready(function() {

	//Setup for ajax requests
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

 	// handler for Add button
	$('#Add').click(function(e) {
		e.preventDefault();
		//get current task text
		var task_text =  $('#task-name').val();
		//Checking for empty task
		if(task_text == ""){
			alert("Please enter some text");
			$('#task-name').attr('placeholder','Please enter some text');
		} else {
		Add_new_task(task_text);
		}
    });

	$("tbody").on("click", "button.btn.btn-danger:contains('Delete')", function(e) {
		var id = $(this).parent('td').parent('tr').attr("id");
		$(this).parent('td').parent('tr').remove();
		//convert id html-element to id DB-element
		var id_task = parseInt(id.replace(/task_/g, ''));
		Delete_task_from_db(id_task);
    });


	$("tbody").on("click", "button.btn.btn-danger:contains('Edit')", function(e) {
		var id = $(this).parent('td').parent('tr').attr("id");
		var task_text = $(this).parent('td').prev('td').prev('td').children('div').text();
		//$(this).parent('td').prev('td').prev('td').children('div').remove();
		$("#" + id +' td:first').children('div').remove();
		$("#" + id +' td:first').append('<input type="text" id="In_edit_task" class="form-control" value="'+ task_text + '">');
		$("#" + id +' td:first').children('input').focus();
		$(this).text('');
		$(this).append('<i class="fa fa-btn fa-save"></i>Save');
    });



    $("tbody").on("click", "button.btn.btn-danger:contains('Save')", function(e) {
		var full_id = $(this).parent('td').parent('tr').attr("id");
		//convert id html-element to id DB-element
		var DB_id = parseInt(full_id.replace(/task_/g, ''));
		var encoded_task_text = htmlEncode($(this).parent('td').prev('td').prev('td').children('input').val());
		$(this).parent('td').prev('td').prev('td').children('input').remove();
		$(this).parent('td').prev('td').prev('td').append('<div>' + encoded_task_text + '</div>');
		$(this).text('');
		$(this).append('<i class="fa fa-btn fa-pencil"></i>Edit');
		//task_text = htmlEncode(task_text);
		Update_task_text(encoded_task_text, DB_id);
    });



	$("tbody").on("click", "td.table-text", function(e) {
		// get id element in css
		var full_id = $(this).closest('tr').attr("id");
		var id = parseInt(full_id.replace(/task_/g, ''));
		if($(this).closest('tr').hasClass('done-task')){
			var task_status = 0;
		}
		else{
			var task_status = 1;
		}
		Change_task_status(task_status, id, full_id);
    });


	function Update_task_text(task_text, id){
            $.ajax({
                type: "POST",
                url: "/update_task.php",
                data: {
                    id_task: id,
                    task_text: task_text
                }
            });
        }


	function Change_task_status(task_status, id, full_id){
        var is_done = task_status;
            $.ajax({
                type: "POST",
                url: "/change_status_task.php",
                data: {
                    id: id,
                    is_done: task_status
                },
                success: function(data){
                    $("#" + full_id).toggleClass('done-task');
                }
            });
        }

	//add new task
    function Add_new_task(task_text){
    	$.ajax({
		    type: "PUT",
		    url: "/tasks/store",
		    data: {
		    	task: task_text
		 	},
		    dataType: "json",
		    success: function(data){
			  	//Add new task-block on the page
				Display_task_on_page(task_text, data.id);
				//Clean input form
				$('#task-name').val("");
			}
		});
    }   


	//delete task from db throw id
    function Delete_task_from_db(id){
    	$.post(
		  "/delete_task.php",
		  {
		    id_task: id
		  }
		);
    }

    //Display new task block on the page
    function Display_task_on_page(task_text, task_id){
		var tr_block = '<tr id="task_' + task_id + '"><td class="table-text"><div>' + task_text + '</div></td><td><button class="btn btn-danger"><i class="fa fa-btn fa-trash"></i>Delete</button></td><td><button class="btn btn-danger"><i class="fa fa-btn fa-pencil"></i>Edit</button></td></tr>';
		$('#current').append(tr_block);
	}

});
