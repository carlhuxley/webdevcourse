var key = "recordCollecion";

window.onload = function() {
  var submitButton = document.getElementById("submit");
  submitButton.onclick = createNote;
  if (!window.localStorage) {
    alert("The Web Storage API is not supported.");
  } else {
    loadNotes();
  }
}

var notes = [];

function createNote() {
  var artistText = document.getElementById("artist");
  artist = artistText.value;
  if (artist == null || artist == "" || artist.length == 0) {
    alert("Please enter an artist!");
    return;
  }

  var albumText = document.getElementById("album");
  album = albumText.value;
  if (album == null || album == "" || album.length == 0) {
    alert("Please enter an album!");
    return;
  }

  var releasedText = document.getElementById("released");
  released = releasedText.value;
  if (released == null || released == "" || released.length == 0) {
    alert("Please enter the year the album was released!");
    return;
  }

  var record = {};
  record.artist = artist;
  record.album = album;
  record.released = released;
    notes.push(record);

  storeNotes();

  addNoteToPage(record);
}

function addNoteToPage(record) {
  var notesUl = document.getElementById("notes");
  var li = document.createElement("li");

  li.innerHTML = "Artist: " + record.artist + " Album: " + record.album + " Released: " + record.released;
  //li.style.backgroundColor = note.color;
  if (notesUl.childElementCount > 0) {
    notesUl.insertBefore(li, notesUl.firstChild);
  } else {
    notesUl.appendChild(li);
  }
}

function storeNotes() {
  var jsonNotes = JSON.stringify(notes);
  localStorage.setItem(key, jsonNotes);
}

function loadNotes() {
  var jsonNotes = localStorage.getItem(key);
  if (jsonNotes != null) {
    notes = JSON.parse(jsonNotes);
    for (var i = 0; i < notes.length; i++) {
      addNoteToPage(notes[i]);
    }
  }
}
