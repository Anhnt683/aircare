<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<table class="table">
    <tr>
        <th>email</th>
    </tr>
</table>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        const htmlCodes = @json($index);
        const htmlCodesName = @json($index1);
        const form_data = [
            'your-name',
            'famimy-name',
            'tel-123',
            'your-email',
            'text-236',
            'floor',
            'flat',
            'tower',
            'street',
            'road',
            'building',
            'village',
            'District',
            'social',
            'FirstPreference',
            'Second',
            'menu-849',
            'menu-442',
            'menu-903',
            'menu-864',
            'radio-5',
            'radio-851',
            'radio-113',
            'radio-905',
            'radio-169',
            'radio-441',
            'text-69',
            'text-232',
            'menu-619',
            'radio-919',
            'radio-312',
            'menu-209',
            'splittypeac-992',


            'windowtypeac-992',
            'fancoiltypeac-992',
            'cassettetypeac-992',
            'total-992',
            'menu-633',
            'menu-541',
            'use_label_element',
            'othertext',
            'othernotes',
            'menu-581',
            'menu-197',
            'menu-891',
            'menu-680',
            'submit_ip',
            'submit_time',
            'menu-902',
        ];
        const infoArray = [];
        const parser = new DOMParser();

        htmlCodes.forEach((htmlCode, index) => {
            const doc = parser.parseFromString(htmlCode, 'text/html');
            const elements = doc.querySelectorAll('span[style="color:#009688"]');

            const infoObject = {};

            elements.forEach((element, innerIndex) => {
                const fieldName = form_data[innerIndex];
                const fieldValue = element.textContent.trim();
                infoObject[fieldName] = fieldValue;
            });
            const emailRegex = /<b>([^<]+)<\/b>/i;
            const emailMatch = htmlCodesName[index].match(emailRegex);

            const email = emailMatch[1].trim();
            infoObject['email'] = email;


            infoArray.push(infoObject);
        });

        const mang = infoArray;
        $.ajax({
            type: 'POST',
            url: '{{ route('add-thong-bao') }}',
            data: {_token: '{{ csrf_token() }}', data: mang},

            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });


</script>

</body>
</html>