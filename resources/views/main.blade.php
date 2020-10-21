<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar Event</title>
  <link rel="icon shortcut" href="{{ asset('') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div id="app">
    <div v-show="passed" class="w-7/12 md:w-4/12 lg:w-3/12 absolute top-4 right-4">
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative" role="alert">
        <p class="text-sm">Event saved successfully</p>
      </div>
    </div>

    <div class="w-11/12 mx-auto my-10">
      <h1 class="heading-1">Calendar</h1>

      <div class="flex flex-wrap">
        <div class="w-full lg:w-3/12 mt-6">
          <Input-Event-Name
            label="Event"
            name="ev-name"
          ></Input-Event-Name>

          <div class="grid gap-4 lg:grid-cols-2 mt-6">
            @php
              $thismonth         = date('m');
              $thisyear          = date('Y');
              $firstday          = mktime(0,0,0, $thismonth, 1, $thisyear);

              $firstday_of_month = date('Y-m-d', $firstday);
              $endday_of_month   = date('Y-m-t');

              // $wkname            = date('D', strtotime($firstday_of_month));
              $wkdays = array();
              $startday = strtotime($firstday_of_month);
              $endday = strtotime($endday_of_month);
              $i = 1;
              $day = '';
              $runningday = '';

              while ($startday < $endday) {
                $runningday = mktime(0,0,0, $thismonth, $i, $thisyear);
                $dayname = date('D', $runningday);
                $dayno = date('w', $runningday);
                $dateno = date('j', $runningday);
                array_push($wkdays, array('dayname'=>$dayname, 'dateno'=>$dateno, 'dayno'=>$dayno));
                $startday = $runningday;
                $i++;
              }

            @endphp
            <div class="inline-block">
              <Input-Date
                min="{{ $firstday_of_month }}"
                max="{{ $endday_of_month }}"
                label="From"
                name="ev-from"
              ></Input-Date>
            </div>
            <div class="inline-block">
              <Input-Date
                min="{{ $firstday_of_month }}"
                max="{{ $endday_of_month }}"
                label="To"
                name="ev-to"
              ></Input-Date>
            </div>
          </div>

          <Input-Checkbox-Group
            :checkboxes="[
              'Mon',
              'Tue',
              'Wed',
              'Thu',
              'Fri',
              'Sat',
              'Sun',
            ]"
            name="ev-wk"
          ></Input-Checkbox-Group>

          <div class="mt-6">
            <a href="#" @click.stop.prevent="saveEvent()" class="btn btn-purple text-sm">Save</a>
          </div>
        </div>

        <div class="w-full lg:w-9/12 mt-10 lg:mt-6 lg:pl-10">
          <h2 class="heading-2 font-bold border-none">October 2020</h2>

          <Table-Event-Monthly
            :data="{{ json_encode($wkdays) }}"
          ></Table-Event-Monthly>
        </div>
      </div>

    </div>
  </div>
  <script src="{{ asset('js/manifest.js') }}"></script>
  <script src="{{ asset('js/vendor.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

