$(document).ready(function(){

  $('.update-todo').click(function(){
    var todo_row = $(this).parents('.title');
    $(todo_row).find('.update-todo-title').addClass('hidden');
    $(todo_row).find('.update-todo-input').removeClass('hidden');
    $(todo_row).find('.update-todo').addClass('hidden');
    $(todo_row).find('.border-r').addClass('hidden');
  })

  $('.btn-send-update').click(function(){
    $('.update-todo').removeClass('hidden');
  })

  $('.btn-remove-update').click(function(){
    var todo_row = $(this).parents('.title');
    $(todo_row).find('.update-todo-input').addClass('hidden');
    $(todo_row).find('.update-todo-title').removeClass('hidden');
    $(todo_row).find('.update-todo').removeClass('hidden');
    $(todo_row).find('.border-r').removeClass('hidden');
  });

  $('.checkbox_task').click(function(){
    var task_row = $(this).parents('.all-task');
    var task_id = $(task_row).find('.hidden-input-task-id').val();
    if (!$(task_row).find('.checkbox_task').attr('checked')) {
      window.location.replace("http://todolist-yii2/task/check/" + task_id + '?value=1');
    }else {
      window.location.replace("http://todolist-yii2/task/check/" + task_id + '?value=0');
    }
  });

  $('.update-task').click(function(){
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.title-task').addClass('hidden');
    $(task_row).find('.deadline-text').addClass('hidden');
    $(task_row).find('.update-form-task').removeClass('hidden');
  });

  $('.btn-remove-update-task').click(function(){
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.update-form-task').addClass('hidden');
    $(task_row).find('.title-task').removeClass('hidden');
    $(task_row).find('.deadline-text').removeClass('hidden');
  });

  $('.move-task-down').click(function(){
    var task_row = $(this).parents('.all-task');
    var task_id = $(task_row).find('.hidden-input-task-id').val();
    window.location.replace("http://todolist-yii2/task/movedown/" + task_id);
  });

  $('.move-task-up').click(function(){
    var task_row = $(this).parents('.all-task');
    var task_id = $(task_row).find('.hidden-input-task-id').val();
    window.location.replace("http://todolist-yii2/task/moveup/" + task_id);
  });

  $(function(){
    $('.tasks-bord-rad > :first-child').find('.move-task-up').css('pointer-events', 'none');
    $('.tasks-bord-rad > :last-child').find('.move-task-down').css('pointer-events', 'none');
  });

  $('.deadline-text').click(function(){
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.deadline-text').addClass('hidden');
    $(task_row).find('.title-task').addClass('hidden');
    $(task_row).find('.update-datetime-deadline').removeClass('hidden');
    $(task_row).find('.update-task').css('pointer-events', 'none');

    $(function(){
      $(".datepicker").datepicker();
    });
  });

  $('.btn-cancel-update-deadline').click(function(){
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.update-datetime-deadline').addClass('hidden');
    $(task_row).find('.title-task').removeClass('hidden');
    $(task_row).find('.deadline-text').removeClass('hidden');
    $(task_row).find('.update-task').css('pointer-events', 'visible');

  });



})
