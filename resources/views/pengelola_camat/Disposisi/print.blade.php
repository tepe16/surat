<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
</style>

<table style="width:100%">
@foreach($disposisi as $dsp)
    <tr>
      <th colspan="2"><b><h2>Lembar Surat Disopsisi Kantor Kecamatan Lilialy</h2></b></th>
    </tr>
    <tr>
      <td>No Urut Surat :{{$dsp->id_disposisi}}</td>
      <td>Sifat : {{$dsp->sifat}}</td>
    </tr>
    <tr>
      <td>Kode Surat : {{$dsp->id_kode_surat}}</td>
      <td>Tanggal Penyelesaian : {{$dsp->tgl_penyelesaian}}}</td>
    </tr>
    <tr>
      <td colspan="2">
     Tanggal Terima : {{$dsp->tgl_masuk}}</br>
     Asal Surat :  {{$dsp->asal_surat}}</br>
    </td>
    </tr>
    <tr>
      <td>Informasi / Intruksi : {{$dsp->intruksi}}</td>
      <td>Diteruskan Kepada : {{$dsp->tujuan}}</td>
    </tr>
    <tr>
        <td colspan="2">
       Sesudah digunakan harap Dikembalikan : </br>
       Kepada: {{$dsp->intruksi}}</br>
       Tanggal Kembali : {{$dsp->intruksi}} </br>
      </td>
    </tr>
@endforeach
</table>
<script type="text/javascript">
    window.print();
</script>