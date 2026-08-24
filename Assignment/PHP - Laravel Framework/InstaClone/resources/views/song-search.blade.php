<!DOCTYPE html>
<html>
<head>
    <title>Live Song Search</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h2>Search Songs (Spotify-style Live Search)</h2>

    <input type="text" id="searchBox" placeholder="Type a song title or artist..." style="width:300px; padding:8px;">

    <div id="loadingIndicator" style="display:none; margin-top:10px; color:blue;">Searching...</div>

    <div id="resultsDiv" style="margin-top:20px;"></div>

    <script>
        $(document).ready(function () {
            $('#searchBox').on('keyup', function () {
                var query = $(this).val();

                $.ajax({
                    url: '/search-songs',
                    method: 'GET',
                    data: { q: query },
                    beforeSend: function () {
                        $('#loadingIndicator').show();
                        $('#resultsDiv').empty();
                    },
                    success: function (data) {
                        var html = '';

                        if (data.length === 0) {
                            html = '<p style="color:gray;">No results found</p>';
                        } else {
                            $.each(data, function (index, song) {
                                html += '<p><strong>' + song.title + '</strong> - ' + song.artist + '</p>';
                            });
                        }

                        $('#resultsDiv').html(html);
                    },
                    error: function () {
                        $('#resultsDiv').html('<p style="color:red;">Something went wrong. Please try again.</p>');
                    },
                    complete: function () {
                        $('#loadingIndicator').hide();
                    }
                });
            });
        });
    </script>
</body>
</html>