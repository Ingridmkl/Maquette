function reply(id, name){
  title = document.getElementById('title');
  title.innerHTML = "Répondre à " + name;
  document.getElementById('reply_id').value = id;
}