<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;


class DynamicPDFController extends Controller
{
    //idnex page of the page to be made to pdf
    function index()
    {
     $data = $this->get_data();
     //file to be converte to pdf
     return view('dynamic_pdf')->with('data', $data);
    }

   // funtion that fetches data
    function get_data()
    {
        //fetch data from a table named tbl_customer with limit of 10 records
     $data = DB::table('tbl_customer')
         ->limit(10)
         ->get();
     return $data;
    }
    // the function makes a pdf file of the  html page to pdf
    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_data_to_html());
     return $pdf->stream();
    }

    function convert_data_to_html()
    {
     $datas = $this->get_data();
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="15%">City</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Country</th>
   </tr>
     ';  
     foreach($datas as $data)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$data->CustomerName.'</td>
       <td style="border: 1px solid; padding:12px;">'.$data->Address.'</td>
       <td style="border: 1px solid; padding:12px;">'.$data->City.'</td>
       <td style="border: 1px solid; padding:12px;">'.$data->PostalCode.'</td>
       <td style="border: 1px solid; padding:12px;">'.$data->Country.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    



}
