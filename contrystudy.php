<?include ("blocks/header.php");?>
<!-- ����� ���� -->
<li><a href="tours.php">����� �����</a></li>
<li><a href="countries.php">������� ������</a></li>
<li><a href="contrystudy.php">�������������</a></li>
<!-- ������� ���� -->
<?include ("blocks/middle.php");?>
<!-- ������� -->
<table cellspacing="0" cellpadding="0" style="width:100%">
<tbody>
<tr><td class="single_top_left"></td><td class="single_top">
    <span class="menuHeader">
        �������������
    </span>
</td><td class="single_top_right"></td></tr>
<tr>
<td class="single_left">

</td>
    <td>
    <!-- ������� -->
        <div style="text-align:center;width:100%">
        <!--
            <select id="countryList">
            </select>
         -->
            <div id="divLetters"></div>
        </div>
        <div id="contentWaiting" style="display:none">
            ���� �������� ����������...
        </div>

        <div id="defaultContent">
        </div>
    <!-- /������� -->
    </td>
<td class="single_right"></td></tr>
<tr><td class="single_bottom_left"></td><td class="single_bottom"></td><td class="single_bottom_right"></td></tr></tbody>
</table>
<!-- ������ -->
<?include ("blocks/footer.php");?>
