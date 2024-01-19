<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form id="myForm" action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-lg-12 col-md-4 mb-3">

                <div class="form-group">
                    <label for="selectField">Name</label>
                    <input type="text" name="name" id="name">
                </div>
                @error('name')
                    <span class="text-danger"></span>
                @enderror
            </div>
            <div>
                <select class="form-select form-select-sm mb-3" id="city" name="city"
                    aria-label=".form-select-sm">
                    <option value="" selected>Chọn tỉnh thành</option>
                </select>
                <select class="form-select form-select-sm mb-3" id="district" name="district"
                    aria-label=".form-select-sm">
                    <option value="" selected>Chọn quận huyện</option>
                </select>

                <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                    <option value="" selected>Chọn phường xã</option>
                </select>

            </div>
            {{-- <div class="form-group">
                <label for="selectField">Select Field</label>
                <select class="form-control" id="selectField" name="selectField">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="imageField">Image</label>
                <input type="file" class="form-control-file" id="imageField" name="imageField">
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

    <script>
        var formSubmitted = false;
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");

        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };

        var cityFromLocalStorage = localStorage.getItem('city');
        var districtFromLocalStorage = localStorage.getItem('district');
        var wardFromLocalStorage = localStorage.getItem('ward');

        var thanhpho;
        var quanhuyen;
        var xaphuong;

        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);

            var cityChangeEvent = new Event('change');
            citis.dispatchEvent(cityChangeEvent);

            var districtChangeEvent = new Event('change');
            districts.dispatchEvent(districtChangeEvent);
        });

        function renderCity(data) {
            for (const x of data) {
                var opt = document.createElement('option');
                opt.value = x.Name;
                opt.text = x.Name;
                opt.setAttribute('data-id', x.Id);
                citis.options.add(opt);
            }

            if (cityFromLocalStorage) {
                for (var i = 0; i < citis.options.length; i++) {
                    var option = citis.options[i];
                    if (option.value === cityFromLocalStorage) {
                        citis.selectedIndex = i;
                        break;
                    }
                }
            }

            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                    for (const k of result[0].Districts) {
                        var opt = document.createElement('option');
                        opt.value = k.Name;
                        opt.text = k.Name;
                        opt.setAttribute('data-id', k.Id);
                        districts.options.add(opt);
                    }
                    var selectedThanhPho = citis.options[citis.selectedIndex];
                    thanhpho = selectedThanhPho.textContent;
                    console.log(thanhpho);
                    localStorage.setItem('city', thanhpho);

                    localStorage.removeItem('district');
                    localStorage.removeItem('ward');

                    if (districtFromLocalStorage) {
                        for (var i = 0; i < districts.options.length; i++) {
                            var option = districts.options[i];
                            if (option.value === districtFromLocalStorage) {

                                districts.selectedIndex = i;
                                break;
                            }
                        }
                        var districtChangeEvent = new Event('change');
                        districts.dispatchEvent(districtChangeEvent);
                    }
                }
            };

            districts.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
                if (this.options[this.selectedIndex].dataset.id != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex]
                        .dataset.id)[0].Wards;

                    for (const w of dataWards) {
                        var opt = document.createElement('option');
                        opt.value = w.Name;
                        opt.text = w.Name;
                        opt.setAttribute('data-id', w.Id);
                        wards.options.add(opt);

                    }
                    var selectedQuanHuyen = districts.options[districts.selectedIndex];
                    quanhuyen = selectedQuanHuyen.textContent
                    console.log(quanhuyen);
                    localStorage.setItem('district', quanhuyen);

                    localStorage.removeItem('ward');

                    if (wardFromLocalStorage) {
                        for (var i = 0; i < wards.options.length; i++) {
                            var option = wards.options[i];
                            if (option.value === wardFromLocalStorage) {
                                wards.selectedIndex = i;
                                break;
                            }
                        }
                    }
                }
            };

            wards.addEventListener("change", function() {
                var selectedXaPhuong = wards.options[wards.selectedIndex];
                xaphuong = selectedXaPhuong.textContent;
                console.log(xaphuong);
                localStorage.setItem('ward', xaphuong);

            });
        }

        document.getElementById("myForm").addEventListener("submit", function() {
            formSubmitted = true;
        });

        window.addEventListener('beforeunload', function(e) {
            if (!formSubmitted) {
                localStorage.clear();
            }
        });
    </script>



</body>

</html>
