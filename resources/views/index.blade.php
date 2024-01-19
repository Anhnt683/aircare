<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <tr>
            <th>email</th>
        </tr>
    </table>

        <script>// Mã HTML cần xử lý
            const htmlCodes = @json($index); // mỗi phần tử của mảng là 1 đoạn text
            const htmlCodesName = @json($index1); // mỗi phần tử của mảng là 1 đoạn text

            // Tạo một mảng để lưu thông tin
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

                'text-232',
                'menu-849',
                'menu-442',
                'splittypeac-992',
                'windowtypeac-992',
                'fancoiltypeac-992',
                'cassettetypeac-992',
                'total-992',
                'radio-169',
                'menu-864',
                'radio-441',
                'menu-209',
                'radio-5',
                'menu-903',
                'radio-851',
                'radio-113',
                'radio-905',
                'menu-633',
                'menu-541',
                'use_label_element'  ,
                'othertext',
                'menu-619',
                'text-69',
                'radio-919',
                'othernotes',
                'radio-312',
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
                    infoObject['htmlCodesName'] = email;


                infoArray.push(infoObject);
            });
            console.log(infoArray);
        </script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>