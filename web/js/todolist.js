$(document).ready(function(){
  $('.update-todo').click(function(){
    var this_obg = $(this).parents('.title');
    $(this_obg).find('.update-todo-title').addClass('hidden');
    $(this_obg).find('.update-todo-input').removeClass('hidden');
    $(this_obg).find('.update-todo').addClass('hidden');
    $(this_obg).find('.border-r').addClass('hidden');
  })

  $('.btn-send-update').click(function(){
    $('.update-todo').removeClass('hidden');
  })

  $('.btn-remove-update').click(function(){
    var this_obg = $(this).parents('.title');
    $(this_obg).find('.update-todo-input').addClass('hidden');
    $(this_obg).find('.update-todo-title').removeClass('hidden');
    $(this_obg).find('.update-todo').removeClass('hidden');
    $(this_obg).find('.border-r').removeClass('hidden');
    // $(this_obg).find('.todolist-title-input').val('');
  })

  $('.checkbox_task').click(function(){
    var this_obg = $(this).parents('.all-tasks');
    var task_id = $(this_obg).find('.hidden-input-task-id').val();
    if (!$(this_obg).find('.checkbox_task').attr('checked')) {
      window.location.replace("http://todolist-yii2/task/check/" + task_id);
    }else {
      window.location.replace("http://todolist-yii2/task/uncheck/" + task_id);
    }

  })
})
