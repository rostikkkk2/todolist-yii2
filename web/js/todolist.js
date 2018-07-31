$(document).ready(() => {

  $('.update-todo').click(function(){
    var todo_row = $(this).parents('.title');
    $(todo_row).find('.update-todo-title').addClass('hidden');
    $(todo_row).find('.update-todo-input').removeClass('hidden');
    $(todo_row).find('.update-todo').addClass('hidden');
    $(todo_row).find('.border-r').addClass('hidden');
    $(todo_row).find('.btn-delete-todolist').css('margin-top', '10px');
  });

  $('.btn-send-update').click(function() {
    $('.update-todo').removeClass('hidden');
  })

  $('.btn-remove-update').click(function() {
    var todo_row = $(this).parents('.title');
    $(todo_row).find('.update-todo-input').addClass('hidden');
    $(todo_row).find('.update-todo-title').removeClass('hidden');
    $(todo_row).find('.update-todo').removeClass('hidden');
    $(todo_row).find('.border-r').removeClass('hidden');
  });

  $('.checkbox_task').on('change', 'input:checkbox', function() {
    $(this).submit();
  });

  $('.update-task').click(function() {
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.title-task').addClass('hidden');
    $(task_row).find('.deadline-text').addClass('hidden');
    $(task_row).find('.update-form-task').removeClass('hidden');
  });

  $('.btn-remove-update-task').click(function() {
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.update-form-task').addClass('hidden');
    $(task_row).find('.title-task').removeClass('hidden');
    $(task_row).find('.deadline-text').removeClass('hidden');
  });

  $(function() {
    $('.tasks-bord-rad > :first-child').find('.move-task-up').css('pointer-events', 'none');
    $('.tasks-bord-rad > :last-child').find('.move-task-down').css('pointer-events', 'none');
  });

  $('.deadline-text').click(function(){
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.deadline-text').addClass('hidden');
    $(task_row).find('.title-task').addClass('hidden');
    $(task_row).find('.update-datetime-deadline').removeClass('hidden');
    $(task_row).find('.update-task').css('pointer-events', 'none');
  });

  $('.btn-cancel-update-deadline').click(function() {
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.update-datetime-deadline').addClass('hidden');
    $(task_row).find('.title-task').removeClass('hidden');
    $(task_row).find('.deadline-text').removeClass('hidden');
    $(task_row).find('.update-task').css('pointer-events', 'visible');
  });

  setTimeout(function() {
    $('.alert-success').fadeOut('fast');
  },5000);

  $('.btn-delete-todolist').click(function() {
    var todo_row = $(this).parents('.title');
    $(todo_row).find('.btn-delete-todolist').attr('disabled', 'true');
    $(this).submit();
  });

  $('.delete-task').click(function() {
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.delete-task').attr('disabled', 'true');
    $(this).submit();
  });

  $('.btn-add-todo').click(function() {
    $('.btn-add-todo').attr('disabled', 'true');
    $(this).submit();
  });

  $('.move-task-down').click(function() {
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.move-task-down').attr('disabled', 'true');
    $(this).submit();
  });

  $('.move-task-up').click(function() {
    var task_row = $(this).parents('.all-task');
    $(task_row).find('.move-task-up').attr('disabled', 'true');
    $(this).submit();
  });

  $('.btn-add-task').click(function() {
    $('.btn-add-task').attr('disabled', 'true');
    $(this).submit();
  });

})
