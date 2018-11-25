<html>
<head>
  <title>Admit Cards | PDF</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="icon" sizes="192x192" href="{{ asset('images/pdf-icon.png') }}">
  <style>
  body {
    font-family: 'kalpurush', sans-serif;
  }
  table {
      border-collapse: collapse;
      width: 100%;
  }

  .maintable tr td, .maintable tr th {
      border: 1px solid black;
  }
  .maintable tr th, .maintable tr td{
    padding: 5px;
    font-family: 'kalpurush', sans-serif;
    font-size: 12px;
  }
  
  @page {
    header: page-header;
    footer: page-footer;
  }
  </style>
</head>
<body>
  <table>
    <tr>
    @php
      $counter = 1;
    @endphp
    @foreach($students as $student)
      <td width="50%" style="padding: 20px; height: 300px;">
        <table>
          <tr>
            <td width="100%" style="border: 1px solid #000; padding: 10">
              <table>
                <tr>
                  <td width="70%">
                    <span style="font-size: 22px; font-weight: bold;">
                      {{ $student->school->name }}<br/>
                      <span style="font-size: 15px;">
                        {{ $student->school->address }}, 
                        {{ $student->school->upazilla }}, 
                        {{ $student->school->district }}<br/>
                        {{ $student->school->currentexam }}-{{ $student->school->currentsession }}<br/>
                        <u>ADMIT CARD</u>
                      </span>
                    </span>
                  </td>
                  <td width="30%">
                    <center>
                      @if($student->image != null && $student->image != '')
                        <img src="{{ public_path('images/admission-images/'.$student->image) }}" height="70" width="70">
                      @else
                        <img src="{{ public_path('images/dummy_student.jpg') }}" height="70" width="70">
                      @endif
                      <br/>
                      ID: {{ $student->student_id }}
                    </center>
                  </td>
                </tr>
              </table>
              <table>
                <tr>
                  <td width="20%"></td>
                  <td width="40%">Class: {{ $student->class }}</td>
                  <td width="30%">Section/ Group: {{ english_section(Auth::user()->school->section_type, $student->class, $student->section) }}</td>
                  <td width="10%"></td>
                </tr>
              </table>
              <table class="maintable">
                <tr>
                  <td width="30%">Roll</td>
                  <td style="padding-left: 10px;">{{ str_pad($student->roll, 2, 0, STR_PAD_LEFT) }}</td>
                </tr>
                <tr>
                  <td width="30%">Name</td>
                  <td style="padding-left: 10px;">{{ $student->name }}</td>
                </tr>
                <tr>
                  <td width="30%">Father's Name</td>
                  <td style="padding-left: 10px;">{{ $student->father }}</td>
                </tr>
                <tr>
                  <td width="30%">Mother's Name</td>
                  <td style="padding-left: 10px;">{{ $student->mother }}</td>
                </tr>
                <tr>
                  <td width="30%">Date of Birth</td>
                  <td style="padding-left: 10px;">{{ date('d-m-Y', strtotime($student->dob)) }}</td>
                </tr>
              </table>
              <br/>
              <table>
                <tr>
                  <td width="10%"></td>
                  <td width="60%">
                    <span style="color: #FFFFFF;">teacher sign</span><br/>
                    Class Teacher
                  </td>
                  <td width="30%">
                    <center>
                      @if(file_exists(public_path('images/schools/signs/'.Auth::user()->school->headmaster_sign)))
                        <img src="{{ public_path('images/schools/signs/'.Auth::user()->school->headmaster_sign) }}" height="40">
                      @endif
                    </center>
                    Head Master
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    @if($counter%2 == 0)
      </tr> <tr>
    @endif
    @if($counter%4 == 0)
     </tr>
    </table>
     <pagebreak></pagebreak>
    <table class="">
      <tr>
    @endif
    @php
      $counter++;
    @endphp
    @endforeach
    </tr>
  </table>
</body>
</html>