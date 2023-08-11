<!DOCTYPE html>
<html>

<head>
    <style>

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0D7AA0;
  color: white;
}
        .button {
            background-color: #0D7AA0;
            ;
            border: none;
            color: white;
            /* //D9D9D9 */
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .head_tag {
            background-color: #0D7AA0;
            border: none;
            color: white;
            padding: 15px 20px;
        }

        .body_tag {
            background-color: #BACBD0;
            padding: 15px 20px;
        }

        .card {
            background-color: white;
            padding: 15px 20px;
        }

        .htext {
            font-size: 16px;
            color: #0D7AA0;

        }

        .a {
            color: white;
        }

        hr.new2 {
            border-top: 1px dashed black;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="head_tag">
            <h2>Admin Report</h2>
        </div>
        <div class="body_tag">
            <div class="card">
                <h3>Completed Order Reports </h3>


                <div class="table-responsive">
                    <table id="customers">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                             
                                <th>Client Name</th>
                                <th>Email</th>
    
                                <th>Pickup </th>
                                <th>Mobile</th>
                                <th>SubTotal</th>
                                <th>Total</th>
                              
                            
    
    
                            </tr>
                        </thead>
                        <tbody>
    
                            @foreach($order as $value)
    
                            <tr>
                                <th scope="row">{{$value->id}}</th>
                                <td>
                                    {{ date('d-m-y', strtotime($value->created_at)) }} 
                                </td>
                         
                                <td> {{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->location}}</td>
                                <td>{{$value->contact}}</td>
                                <td>{{$value->subtotal}}</td>
    
                                <td>{{$value->total}}</td>
                              
                                <td>
    
                           
                                </td>
    
    
                            </tr>
    
                            @endforeach
    
                        </tbody>
                    </table>
    
             
                </div>


            </div>
        </div>


    </div>


</body>

</html>
