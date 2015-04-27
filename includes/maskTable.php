<div id="filter-table">
    <div id="sidebar-filter-table">
        <table id="mask-content-right-table" class="table table-bordered text-center">
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
            <tbody id="m-bodyTable"><!-- Bảng thời khóa biểu tuần -->
            <tr id="m-lesson1">
                <td title="7h - 7h50'" id="m-location-01"  class="" onclick="chooseRow(1,11,21,31,41)" >1</td>
                <td id="m-location-1" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-11" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-21" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-31" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-41" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr id="m-lesson2">
                <td title="8h - 8h50'" id="m-location-02" class="" onclick="chooseRow(2,12,22,32,42)">2</td>
                <td id="m-location-2" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-12" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-22" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-32" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-42" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr id="m-lesson3">
                <td title="9h - 9h50'" id="m-location-03" class="" onclick="chooseRow(3,13,23,33,43)">3</td>
                <td id="m-location-3" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-13" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-23" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-33" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-43" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr id="m-lesson4">
                <td title="10h - 10h50'" id="m-location-04" class="" onclick="chooseRow(4,14,24,34,44)">4</td>
                <td id="m-location-4" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-14" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-24" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-34" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-44" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr id="m-lesson5">
                <td title="11h - 11h50'" id="m-location-05" class="" onclick="chooseRow(5,15,25,35,45)">5</td>
                <td id="m-location-5" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-15" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-25" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-35" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-45" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr>
                <td colspan="6" title="11h50' - 13h" class="bg-success">Đi ăn cơm với gấu</td>
            </tr>
            <tr id="m-lesson6">
                <td title="13h - 13h50'" id="m-location-06" class="" onclick="chooseRow(6,16,26,36,46)">6</td>
                <td id="m-location-6" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-16" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-26" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-36" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-46" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr id="m-lesson7">
                <td title="14h - 14h50'" id="m-location-07" class="" onclick="chooseRow(7,17,27,37,47)">7</td>
                <td id="m-location-7" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-17" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-27" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-37" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-47" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr id="m-lesson8">
                <td title="15h - 15h50'" id="m-location-08" class="" onclick="chooseRow(8,18,28,38,48)">8</td>
                <td id="m-location-8" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-18" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-28" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-38" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-48" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr id="m-lesson9">
                <td title="16h - 16h50'" id="m-location-09" class="" onclick="chooseRow(9,19,29,39,49)">9</td>
                <td id="m-location-9" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-19" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-29" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-39" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-49" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            <tr id="m-lesson10">
                <td title="17h - 17h50'" id="m-location-010" class="" onclick="chooseRow(10,20,30,40,50)">10</td>
                <td id="m-location-10" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-20" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-30" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-40" onclick="chooseLocation(this.id)" class=""></td>
                <td id="m-location-50" onclick="chooseLocation(this.id)" class=""></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>