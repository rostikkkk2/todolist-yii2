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
    var todo_row = $(this).parents('.all-task');
    var task_id = $(todo_row).find('.hidden-input-task-id').val();
    if (!$(todo_row).find('.checkbox_task').attr('checked')) {
      window.location.replace("http://todolist-yii2/task/check/" + task_id + '?value=1');
    }else {
      window.location.replace("http://todolist-yii2/task/check/" + task_id + '?value=0');
    }
  });

  $('.update-task').click(function(){
    var todo_row = $(this).parents('.all-task');
    $(todo_row).find('.title-task').addClass('hidden');
    $(todo_row).find('.update-form-task').removeClass('hidden');
  });

  $('.btn-remove-update-task').click(function(){
    var todo_row = $(this).parents('.all-task');
    $(todo_row).find('.update-form-task').addClass('hidden');
    $(todo_row).find('.title-task').removeClass('hidden');
  });

})
