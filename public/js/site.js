$(document).ready(function () {
  $('#employees-table').DataTable({
    language: {
      url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json',
    },
    columnDefs: [
      {
        targets: [3, 4, 5],
        orderable: false,
      },
    ],
  });
  $('#companies-table').DataTable({
    language: {
      url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json',
    },
    columnDefs: [
      {
        targets: [1, 3, 5],
        orderable: false,
      },
    ],
  });
  $('.delete-btn').click(function (event) {
    event.preventDefault();
    if (window.confirm('Действительно удалить запись?')) {
      $(this).parent().submit();
    } else return false;
  });
});
