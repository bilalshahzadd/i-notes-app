// selecting html elements
let edit = document.getElementsByClassName('edit');

// selecting elements in the loop
Array.from(edit).forEach((element) => {

    // ading eventlistener to the edit button
    element.addEventListener('click', (e) => {
        tr = e.target.parentNode.parentNode;

        // selecting first two td's
        title = tr.getElementsByTagName('td')[0].innerText;
        description = tr.getElementsByTagName('td')[1].innerText;

        // assigning values to the update form
        titleEdit.value = title;
        descriptionEdit.value = description;
        updateId.value = e.target.id;
    })
})

// selecting delete button
deletes = document.getElementsByClassName('delete');

// adding event listener to the element
Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
        console.log("edit");

        // assigning values
        sno = e.target.id.substr(1);

        // confirming
        if (confirm("Are you sure you want to delete this listing!")) {
            console.log("yes");
            window.location = `./saved_notes.php?delete=${sno}`;
        } else {
            console.log("no");
        }
    })
})