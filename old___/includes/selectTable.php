
<div id="select-table">
    <table id="content-right-table" class="table table-bordered text-center">
        <thead class="bg-primary">
        <tr>
            <th class="text-center col-lg-1">Tiết \Thứ</th>
            <th class="text-center col-lg-2" class="" onclick="chooseColum(1,10)">Hai</th>
            <th class="text-center col-lg-2" class="" onclick="chooseColum(11,20)">Ba</th>
            <th class="text-center col-lg-2" class="" onclick="chooseColum(21,30)">Tư</th>
            <th class="text-center col-lg-2" class="" onclick="chooseColum(31,40)">Năm</th>
            <th class="text-center col-lg-2" class="" onclick="chooseColum(41,50)">Sáu</th>
        </tr>
        </thead>
        <tbody id="bodyTable"><!-- Bảng thời khóa biểu tuần -->
        <tr id="select-lesson1">
            <td title="7h - 7h50'" id="select-location-01"  class="" onclick="chooseRow(1,11,21,31,41)" >1</td>
            <td id="select-location-1" class="" onclick="choose(this.id)"></td>
            <td id="select-location-11" class="" onclick="choose(this.id)"></td>
            <td id="select-location-21" class="" onclick="choose(this.id)"></td>
            <td id="select-location-31" class="" onclick="choose(this.id)"></td>
            <td id="select-location-41" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr id="select-lesson2">
            <td title="8h - 8h50'" id="select-location-02" class="" onclick="chooseRow(2,12,22,32,42)">2</td>
            <td id="select-location-2" class="" onclick="choose(this.id)"></td>
            <td id="select-location-12" class="" onclick="choose(this.id)"></td>
            <td id="select-location-22" class="" onclick="choose(this.id)"></td>
            <td id="select-location-32" class="" onclick="choose(this.id)"></td>
            <td id="select-location-42" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr id="select-lesson3">
            <td title="9h - 9h50'" id="select-location-03" class="" onclick="chooseRow(3,13,23,33,43)">3</td>
            <td id="select-location-3" class="" onclick="choose(this.id)"></td>
            <td id="select-location-13" class="" onclick="choose(this.id)"></td>
            <td id="select-location-23" class="" onclick="choose(this.id)"></td>
            <td id="select-location-33" class="" onclick="choose(this.id)"></td>
            <td id="select-location-43" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr id="select-lesson4">
            <td title="10h - 10h50'" id="select-location-04" class="" onclick="chooseRow(4,14,24,34,44)">4</td>
            <td id="select-location-4" class="" onclick="choose(this.id)"></td>
            <td id="select-location-14" class="" onclick="choose(this.id)"></td>
            <td id="select-location-24" class="" onclick="choose(this.id)"></td>
            <td id="select-location-34" class="" onclick="choose(this.id)"></td>
            <td id="select-location-44" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr id="select-lesson5">
            <td title="11h - 11h50'" id="select-location-05" class="" onclick="chooseRow(5,15,25,35,45)">5</td>
            <td id="select-location-5" class="" onclick="choose(this.id)"></td>
            <td id="select-location-15" class="" onclick="choose(this.id)"></td>
            <td id="select-location-25" class="" onclick="choose(this.id)"></td>
            <td id="select-location-35" class="" onclick="choose(this.id)"></td>
            <td id="select-location-45" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr>
            <td colspan="6" title="11h50' - 13h" class="bg-info">Đi ăn cơm với gấu</td>
        </tr>
        <tr id="select-lesson6" id="select-location-06">
            <td title="13h - 13h50'" class="" onclick="chooseRow(6,16,26,36,46)">6</td>
            <td id="select-location-6" class="" onclick="choose(this.id)"></td>
            <td id="select-location-16" class="" onclick="choose(this.id)"></td>
            <td id="select-location-26" class="" onclick="choose(this.id)"></td>
            <td id="select-location-36" class="" onclick="choose(this.id)"></td>
            <td id="select-location-46" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr id="select-lesson7" id="select-location-07">
            <td title="14h - 14h50'" class="" onclick="chooseRow(7,17,27,37,47)">7</td>
            <td id="select-location-7" class="" onclick="choose(this.id)"></td>
            <td id="select-location-17" class="" onclick="choose(this.id)"></td>
            <td id="select-location-27" class="" onclick="choose(this.id)"></td>
            <td id="select-location-37" class="" onclick="choose(this.id)"></td>
            <td id="select-location-47" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr id="select-lesson8" id="select-location-08">
            <td title="15h - 15h50'" class="" onclick="chooseRow(8,18,28,38,48)">8</td>
            <td id="select-location-8" class="" onclick="choose(this.id)"></td>
            <td id="select-location-18" class="" onclick="choose(this.id)"></td>
            <td id="select-location-28" class="" onclick="choose(this.id)"></td>
            <td id="select-location-38" class="" onclick="choose(this.id)"></td>
            <td id="select-location-48" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr id="select-lesson9" id="select-location-09">
            <td title="16h - 16h50'" class="" onclick="chooseRow(9,19,29,39,49)">9</td>
            <td id="select-location-9" class="" onclick="choose(this.id)"></td>
            <td id="select-location-19" class="" onclick="choose(this.id)"></td>
            <td id="select-location-29" class="" onclick="choose(this.id)"></td>
            <td id="select-location-39" class="" onclick="choose(this.id)"></td>
            <td id="select-location-49" class="" onclick="choose(this.id)"></td>
        </tr>
        <tr id="select-lesson10" id="select-location-010">
            <td title="17h - 17h50'" class="" onclick="chooseRow(10,20,30,40,50)">10</td>
            <td id="select-location-10" class="" onclick="choose(this.id)"></td>
            <td id="select-location-20" class="" onclick="choose(this.id)"></td>
            <td id="select-location-30" class="" onclick="choose(this.id)"></td>
            <td id="select-location-40" class="" onclick="choose(this.id)"></td>
            <td id="select-location-50" class="" onclick="choose(this.id)"></td>
        </tr>
        </tbody>
    </table>
</div>

