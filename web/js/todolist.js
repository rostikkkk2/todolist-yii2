$(document).ready(function(){
  $('.update_todo').click(function(){
    var this_obg = $(this).parents('.title');
    $(this_obg).find('.update_todo_title').addClass('hidden');
    $(this_obg).find('.update_todo_input').removeClass('hidden');
    $(this_obg).find('.update_todo').addClass('hidden');
    $(this_obg).find('.border-r').addClass('hidden');
  })

  $('.btn-send-update').click(function(){
    $('.update_todo').removeClass('hidden');
  })

  $('.btn-remove-update').click(function(){
    var this_obg = $(this).parents('.title');
    $(this_obg).find('.update_todo_input').addClass('hidden');
    $(this_obg).find('.update_todo_title').removeClass('hidden');
    $(this_obg).find('.update_todo').removeClass('hidden');
    $(this_obg).find('.border-r').removeClass('hidden');
    // $(this_obg).find('.todolist-title-input').val('');
  })
})
