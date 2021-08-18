require('./bootstrap');

const clctnEditBtns = $('button[id^=clctnEditBtn]').toArray();
const clctnDelBtns = $('button[id^=clctnDelBtn]').toArray();

const clctnEditForm = $('#clctnEditForm')[0];
const clctnDeleteForm = $('#clctnDeleteForm')[0];

const editClctnFormLabel = $('#editClctnModalLabel')[0]?.innerHTML;
const deleteClctnFormLabel =  $('#deleteClctnModalLabel')[0]?.innerHTML;
const editClctnFormAction = clctnEditForm?.action;
const deleteClctnFormAction = clctnDeleteForm?.action;

clctnEditBtns.forEach(btn => {
    btn.addEventListener('click', event => {
        let id = parseInt(event.target.id.substring("clctnEditBtn".length));
        $('#editClctnModalLabel')[0].innerHTML = editClctnFormLabel + $(`#nameLabel${id}`)[0].innerHTML + ` (${id})`;
        clctnEditForm.elements['name'].value = $(`#nameLabel${id}`)[0].innerHTML;
        clctnEditForm.action = editClctnFormAction + `${id}`;
    });
});

clctnDelBtns.forEach(btn => {
    btn.addEventListener('click', event => {
        let id = parseInt(event.target.id.substring("clctnDelBtn".length));
        $('#deleteClctnModalLabel')[0].innerHTML = deleteClctnFormLabel + $(`#nameLabel${id}`)[0].innerHTML + ` (${id})`;
        clctnDeleteForm.action = deleteClctnFormAction + `${id}`;
    });
});

// ----------------------------------------------------------------

const wordEditBtns = $('button[id^=wordEditBtn]').toArray();
const wordDelBtns = $('button[id^=wordDelBtn]').toArray();

const wordEditForm = $('#wordEditForm')[0];
const wordDeleteForm = $('#wordDeleteForm')[0];

const editWordFormLabel = $('#editWordModalLabel')[0]?.innerHTML;
const deleteWordFormLabel =  $('#deleteWordModalLabel')[0]?.innerHTML;
const editWordFormAction = wordEditForm?.action;
const deleteWordFormAction = wordDeleteForm?.action;

wordEditBtns.forEach(btn => {
    btn.addEventListener('click', event => {
        let id = parseInt(event.target.id.substring("wordEditBtn".length));
        $('#editWordModalLabel')[0].innerHTML = editWordFormLabel + $(`#entryLabel${id}`)[0].innerHTML + ` (${id})`;
        wordEditForm.elements['entry'].value = $(`#entryLabel${id}`)[0].innerHTML;
        wordEditForm.elements['comment'].value = $(`#cmtLabel${id}`)[0].innerHTML;
        wordEditForm.action = editWordFormAction + `${id}`;
    });
});

wordDelBtns.forEach(btn => {
    btn.addEventListener('click', event => {
        let id = parseInt(event.target.id.substring("wordDelBtn".length));
        $('#deleteWordModalLabel')[0].innerHTML = deleteWordFormLabel + $(`#entryLabel${id}`)[0].innerHTML + ` (${id})`;
        wordDeleteForm.action = deleteWordFormAction + `${id}`;
    });
});

// ----------------------------------------------------------------

const clctnWordDelBtns = $('button[id^=clctnWordDelBtn]').toArray();

const addWordToClctnForm = $('#addWordToClctnForm')[0];
const deleteWordFromClctnForm = $('#deleteWordFromClctnForm')[0];

const wordSelection = addWordToClctnForm?.elements['wordSelection'];
const addWordToClctnFormAction = addWordToClctnForm?.action;
const deleteWordFromClctnFormAction = deleteWordFromClctnForm?.action;

wordSelection?.addEventListener('change', event => {
    addWordToClctnForm.action = addWordToClctnFormAction + event.target.value;
});

clctnWordDelBtns.forEach(btn => {
    btn.addEventListener('click', event => {
        let id = parseInt(event.target.id.substring("clctnWordDelBtn".length));
        $('#deleteWordModalLabel')[0].innerHTML = deleteWordFormLabel + $(`#entryLabel${id}`)[0].innerHTML + ` (${id})`;
        deleteWordFromClctnForm.action = deleteWordFromClctnFormAction + `${id}`;
        console.log(deleteWordFromClctnForm.action);
    });
});

$(() => {
    if (addWordToClctnForm) {
        addWordToClctnForm.action += wordSelection.value;
    };
})
