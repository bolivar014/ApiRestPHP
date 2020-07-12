// 
$('#loadBooks').click(function() {
    $('#messages').first('p').text('Cargando Libros...');
    $('#messages').show();
    $.ajax({
        'url': 'http://localhost/api',
        'success': function( data) {
            $('#messages').hide();
            $('#booksTable > tbody').empty();
            for( b in data ){ 
                addBook( data[b] );

            }
            $('#bookForm').show();
        }
    })
});

$('#bookSave').click(function() {
    var newBook = {
        'titulo': $('bookTitle').val(),
        'id_autor': $('bookAuthorId').val(),
        'id_genero': $('bookGenreId').val(),
        
    }

    $('#messages').first('p').text('Guardando libro...');

    $('#messages').show();

    $.ajax({
        'url': 'http://localhost/api',
        'method': 'POST',
        'data': JSON.stringify( newBook ),
        'success': function( data ) {
            $('#messages').hide();
            addBook( newBook );
        }
    });
});
// 
function addBook( book ) {
    $('#booksTable tr:last').after('<tr><td>' + book.titulo + '</td><td>' + book.id_autor + '</td><td>' + book.id_genero + '</td></tr>');
}


