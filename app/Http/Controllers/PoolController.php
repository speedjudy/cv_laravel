<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\Setting;
use App\Models\Tablenum;
use App\Models\Line;
use App\Models\Checkserver;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home');
    }

    public function register()
    {
        return view('register');
    }
    public function setting_view()
    {
        return view('setting');
    }
    public function score_view()
    {
        return view('score');
    }
    public function run_server()
    {
        return view('run_server');
    }

    public function run_server_push(Request $request)
    {
        $date = $request->input('date');
        $total_pool = Pool::whereIn('step', [1, 2, 3, 4, 5])->get();
        $pool_data0 = Pool::where('step', 0)->get();
        $first_pool_data = Pool::where('step', 1)->get();
        $second_pool_data = Pool::where('step', 2)->get();
        $third_pool_data = Pool::where('step', 3)->get();
        $fourth_pool_data = Pool::where('step', 4)->get();
        $fifth_pool_data = Pool::where('step', 5)->get();
        if (count($fifth_pool_data) > 0) {
            $fifthUpdateDatas = ['step' => 6, 'date' => $date];
            Pool::where('step', 5)->update($fifthUpdateDatas);
        }
        if (count($fourth_pool_data) > 0) {
            //
            $table_num = Tablenum::get();
            $left = $table_num[0]['left_num'] * 1;
            $right = $table_num[0]['right_num'] * 1;
            if ($left == 9) {
                $left_num = 1;
                $right_num = 2;
            } else if ($left == 0) {
                $left_num = 1;
                $right_num = 2;
            } else {
                $left_num = 2 + $left;
                $right_num = 2 + $right;
            }
            $tableCountUpUpdateDatas = ['left_num' => $left_num, 'right_num' => $right_num];
            Tablenum::where('id', 1)->update($tableCountUpUpdateDatas);
            $fourthUpdateDatas = ['step' => 5];
            Pool::where('step', 4)->update($fourthUpdateDatas);
        }
        if (count($third_pool_data) > 0) {
            $thirdUpdateDatas = ['step' => 4];
            Pool::where('step', 3)->update($thirdUpdateDatas);
        }
        if (count($second_pool_data) > 0) {
            $secondUpdateDatas = ['step' => 3];
            Pool::where('step', 2)->update($secondUpdateDatas);
        }
        if (count($first_pool_data) > 0) {
            $firstUpdateDatas = ['step' => 2];
            Pool::where('step', 1)->update($firstUpdateDatas);
            // $this->save_line();
        }
        $pool_data1 = Pool::where('step', 1)->get();

        if (count($pool_data0) > 0) {
            $poolActive = array();
            $connectNumber = array();

            foreach ($pool_data0 as $row) {
                array_push($poolActive, $row['id']);
                if ($date * 1 > $row['date'] * 1) {
                    if (count($connectNumber) < 2) {
                        array_push($connectNumber, $row['id']);
                    }
                }
            }
            $poolActive = array_merge(array_diff($poolActive, $connectNumber));

            if (count($connectNumber) == 2 && count($pool_data1) == 0) {
                if (count($poolActive) > 1) {
                    $rand_key = array_rand($poolActive, 1);
                    $firstVal = $poolActive[$rand_key];
                    array_splice($poolActive, $rand_key, 1);
                    $rand_key1 = array_rand($poolActive, 1);
                    $secondVal = $poolActive[$rand_key1];
                    if ($firstVal != $secondVal) {
                        $firstUpdateData = ['step' => 1, 'order_num' => 1, 'date' => $date];
                        Pool::where('id', $connectNumber[0])->update($firstUpdateData);
                        $secondUpdateData = ['step' => 1, 'order_num' => 2, 'date' => $date];
                        Pool::where('id', $firstVal)->update($secondUpdateData);
                        $thirdUpdateData = ['step' => 1, 'order_num' => 3, 'date' => $date];
                        Pool::where('id', $connectNumber[1])->update($thirdUpdateData);
                        $fourthUpdateData = ['step' => 1, 'order_num' => 4, 'date' => $date];
                        Pool::where('id', $secondVal)->update($fourthUpdateData);
                        $this->save_line();
                    }
                } else if (count($poolActive) == 1) {
                    $firstUpdateData = ['step' => 1, 'order_num' => 1, 'date' => $date];
                    Pool::where('id', $connectNumber[0])->update($firstUpdateData);
                    $secondUpdateData = ['step' => 1, 'order_num' => 2, 'date' => $date];
                    Pool::where('id', $poolActive[0])->update($secondUpdateData);
                    $thirdUpdateData = ['step' => 1, 'order_num' => 3, 'date' => $date];
                    Pool::where('id', $connectNumber[1])->update($thirdUpdateData);
                    $fourthUpdateData = ['number' => "OPEN", 'date' => $date, 'step' => 1, 'order_num' => 4];
                    Pool::create($fourthUpdateData);
                    $this->save_line();
                } else if (count($poolActive) == 0) {
                    $firstUpdateData = ['step' => 1, 'order_num' => 1, 'date' => $date];
                    Pool::where('id', $connectNumber[0])->update($firstUpdateData);
                    $secondUpdateData = ['step' => 1, 'order_num' => 2, 'date' => $date];
                    Pool::where('id', $connectNumber[1])->update($secondUpdateData);
                    $thirdUpdateData = ['number' => "OPEN", 'date' => $date, 'step' => 1, 'order_num' => 3];
                    Pool::create($thirdUpdateData);
                    $fourthUpdateData = ['number' => "OPEN", 'date' => $date, 'step' => 1, 'order_num' => 4];
                    Pool::create($fourthUpdateData);
                    $this->save_line();
                }
            }
        }
        $pool_data1 = Pool::where('step', 1)->get();
        if (count($total_pool) > 0 && count($pool_data1) == 0) {
            $firstUpdateData = ['number' => "OPEN", 'date' => $date, 'step' => 1, 'order_num' => 1];
            Pool::create($firstUpdateData);
            $secondUpdateData = ['number' => "OPEN", 'date' => $date, 'step' => 1, 'order_num' => 2];
            Pool::create($secondUpdateData);
            $thirdUpdateData = ['number' => "OPEN", 'date' => $date, 'step' => 1, 'order_num' => 3];
            Pool::create($thirdUpdateData);
            $fourthUpdateData = ['number' => "OPEN", 'date' => $date, 'step' => 1, 'order_num' => 4];
            Pool::create($fourthUpdateData);
            $this->save_line();
        }
        Pool::where('step', '=', 6)->delete();
        echo "success";
        exit();
    }
    public function check_server(Request $request)
    {
        $flag = $request->input("flag");
        $date = $request->input("date");
        if ($flag == "active") {
            Checkserver::create(['progress'=>"active", 'date'=> $date]);
        } else if ($flag == "getactive") {
            $res = Checkserver::get();
            print_r(json_encode($res));
            exit();
        } else {
            Checkserver::truncate();
        }
        $res = Checkserver::get();
        print_r(json_encode($res));
        exit();
    }
    public function save_line()
    {
        $line_data = Line::get();
        $line = $line_data[0]['line'] * 1;
        $data = $line + 1;
        $lineUpdateDatas = ['line' => $data];
        Line::where('id', 1)->update($lineUpdateDatas);
    }
    public function score_getdata()
    {
        $data = Pool::whereNotIn('step', [0, 6])->get();
        $table_num = Tablenum::get();

        $line_data = Line::get();
        $line = $line_data[0]['line'] * 1;
        echo json_encode([$data, $table_num[0], $line]);
        exit();
    }
    public function setting_getdata()
    {
        $setting_data = Setting::get();
        echo json_encode($setting_data[0]);
        exit();
    }
    public function setting_save(Request $request)
    {
        $countdown_time = $request->input('countdown_time');
        $waiting_time = $request->input('waiting_time');
        $data = [
            'countdown_time' => $countdown_time,
            'waiting_time' => $waiting_time
        ];
        Setting::where('id', 1)->update($data);
        echo "Success";
        exit();
    }
    public function setting_clear()
    {
        Pool::truncate();
        Tablenum::truncate();
        $insertData = [
            'left_num' => 0,
            'right_num' => 1
        ];
        $data = [
            'line' => 0
        ];
        Line::where('id', 1)->update($data);
        Checkserver::truncate();
        Tablenum::create($insertData);
        echo "Success";
        exit();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register_add(Request $request)
    {
        //
        $guest_number = $request->input('guest_number');
        $date = $request->input('date');
        $insertData = [
            'number' => $guest_number,
            'date' => $date,
            'step' => 0,
            'order_num' => 0
        ];
        Pool::create($insertData);
        echo "Success";
        exit();
    }
}
