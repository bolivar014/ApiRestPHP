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

function addBook( book ) {
    $('#booksTable tr:last').after('<tr><td>' + book.titulo + '</td><td>' + book.id_autor + '</td><td>' + book.id_genero + '</td></tr>');
}