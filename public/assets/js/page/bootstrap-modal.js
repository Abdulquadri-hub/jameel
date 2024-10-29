$("#modalAddRole").fireModal({
  title: 'Add A New Role',
  body: $("#modal-add-role-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  buttons: [
    {
      text: 'Save',
      submit: true,
      class: 'btn btn-primary btn-shadow',
    }
  ]
});

$("#modalAddPermission").fireModal({
  title: 'Add A New Permission',
  body: $("#modal-add-permission-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
  buttons: [
    {
      text: 'Save',
      submit: true,
      class: 'btn btn-primary btn-shadow',
    }
  ]
});
