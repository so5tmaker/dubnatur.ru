                <meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
		<!-- ListBox -->
		<script src="tours/js/Controls/ListBox.js"></script>
		<!-- ����� ����� ��� ���� ���������� ������� -->
		<link href="tours/Styles/Controls/ListBox.css" rel="stylesheet"></link>
		<!-- Calendar -->
		<script src="tours/js/Controls/Calendar.js"></script>
		<!-- ����� ����� ��� ���� ���������� -->
		<link href="tours/Styles/Controls/calendar/skins/theme.css" rel="stylesheet"></link>
		<!-- ������� ���������� ��������� ��������� ���������� -->
                <?
                if (strstr($USER_AGENT, 'IE') == TRUE)
                {
                    print <<<HERE
                    <link id="styles" href="tours/Styles/SearchForm_row_ie.css" type="text/css" rel="stylesheet">
HERE;
                }
                else
                {
                    print <<<HERE
                    <link id="styles" href="tours/Styles/SearchForm_row.css" type="text/css" rel="stylesheet">
HERE;
                }
		
                ?>
		<script src="tours/js/PageScript/SearchForm.js" type="text/javascript"></script>
