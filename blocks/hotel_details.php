<div style="margin-top: 10px;">
		<div id="WaitingControl" style="float: right; display: none;">
			<img src="tours/Images/snake.gif" alt="" width="16" height="16" />
			���� ��������...</div>
		<div id="NavigationBar" style="height: 20px;">
		</div>
	</div>
	<div id="PageTitle" style="height: 20px;">
	</div>
	<div id="Div7" style="display: inline;">
		<span id="requestResultMessage" style="display: none;"></span>
	</div>
	<table cellspacing="0" cellpadding="0" width="100%" border="0">
		<tr valign="bottom">
			<td height="14">
				<img src="tours/Images/bg20.gif" width="15" height="6" border="0"></td>
			<td style="background: url(tours/Images/bg21.gif) repeat-x left bottom">
				<span class="h1">
					<img src="tours/Images/ic1.gif" width="7" height="7" border="0">
					&nbsp;&nbsp;<span name="HotelDescription.hotel.russianName$token"></span> </span>
			</td>
			<td>
				<img src="tours/Images/bg22.gif" width="15" height="6" border="0"></td>
		</tr>
		<tr valign="top">
			<td style="background: url(tours/Images/bg18.gif) repeat-y left top" width="15">
				<img height="1" src="tours/Images/e.gif" width="15" border="0">
			</td>
			<td width="100%">
				<!-- ���������� ������������ ���� -->
				<table cellspacing="3" cellpadding="0" width="100%" border="0">
					<tr>
						<td width="35%" valign="bottom">
							<!-- ������� ��� ������ ������ ���������� -->
							<span name="getHotelImageOfParticularType(HotelDescription.images, '', 320, 240)$token"></span>
							<br>
							<br>
							<b>������� ����������(<span name="HotelDescription.imageCount$token"></span>)</b> <a href="#" onclick="return showGallery();">>></a>
							<!-- //������� ��� ������ ������ ���������� -->
						</td>
						<td width="35%">
							<!-- ������� ��� ������ ��������� �� ����� -->
							<table>
								<tr>
									<td>
										<strong>������:</strong></td>
									<td name="HotelDescription.hotel.country.russianName$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>�����:</strong></td>
									<td name="HotelDescription.hotel.city.russianName$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>����������:</strong></td>
									<td name="HotelDescription.hotel.star.russianName$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>�����:</strong></td>
									<td name="HotelDescription.hotel.postalAddress$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>�������:</strong></td>
									<td name="HotelDescription.hotel.phoneNumber$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>����:</strong></td>
									<td name="HotelDescription.hotel.faxNumber$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>E-mail:</strong></td>
									<td name="HotelDescription.hotel.emailAddress$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>����:</strong></td>
									<td name="getReference(HotelDescription.hotel.url, HotelDescription.hotel.url, '', '', '_blank')$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>�������� ����������:</strong></td>
									<td name="HotelDescription.hotel.informationSource$token">
									</td>
								</tr>
								<tr>
									<td>
										<strong>��������� �����:</strong></td>
									<td name="HotelDescription.hotel.copyright$token">
									</td>
								</tr>
                                <tr id="rowHotelPanoramasLink" style="display: none">
                                    <td>
                                    </td>
                                    <td>
                                        <a target="_blank" id="lnkHotelPanoramas">
                                            <img src="tours/Images/visualhotels_px.gif" border="0" />
                                            <b>����������� ��� �� �����</b> </a>
                                    </td>
                                </tr>
							</table>
							<div style="margin-top: 10px;">
								<span name="GetSatellitePicturePageReference(HotelDescription)$token"></span>
							</div>
						</td>
						<td width="30%" rowspan="3" height="100%" id="HotelCommentCell">
							<table cellspacing="0" cellpadding="0" width="100%" height="100%" border="0">
								<tr id="externalHotelSourcesTable" style="width: 100%; display: none;">
									<td>
										<table cellspacing="0" cellpadding="0" width="100%" height="100%" border="0">
											<tr valign="bottom">
												<td height="14">
													<img src="tours/Images/bg20.gif" width="15" height="6" border="0"></td>
												<td style="background: url(tours/Images/bg21.gif) repeat-x left bottom">
													<span class="h1">
														<img src="tours/Images/ic1.gif" width="7" height="7" border="0">
														&nbsp;��&nbsp;������&nbsp;������</span></td>
												<td style="width: 16px">
													<img src="tours/Images/bg22.gif" width="15" height="6" border="0"></td>
											</tr>
											<tr valign="top">
												<td style="background: url(tours/Images/bg18.gif) repeat-y left top" width="15">
													<img height="1" src="tours/Images/e.gif" width="15" border="0">
												</td>
												<td width="100%" height="100%">
													<br>
													<div class="m_block1" style="overflow: hidden; width: 100%; height: auto" id="Div1">
														<table width="100%">
															<tr>
																<td>
																	�������������� ���������� �� ������ ���������� �����:
																</td>
															</tr>
															<tr name="HotelDescription.externalHotelSources$row">
																<td>
																	<h2><span name="HotelDescription.externalHotelSources.webAddress$token"></span></h2>
																	<span name="getReference(HotelDescription.externalHotelSources.url, '������� � ������', '', '', '_blank')$token"></span>
																</td>
															</tr>
														</table>
													</div>
												</td>
												<td style="background: url(tours/Images/bg19.gif) repeat-y left top; width: 16px;">
													<img height="1" src="tours/Images/e.gif" width="15" border="0">
												</td>
											</tr>
											<tr>
												<td height="14">
													<img height="14" src="tours/Images/bg15.gif" width="15" border="0"></td>
												<td style="background: url(tours/Images/bg16.gif) repeat-x left top">
													<img height="1" src="tours/Images/e.gif" width="1" border="0">
												</td>
												<td style="width: 16px">
													<img height="14" src="tours/Images/bg17.gif" width="15" border="0"></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr style="height: 80%; width: 100%;">
									<td>
										<!-- ������� ��� ������ ������� �������� -->
										<table cellspacing="0" cellpadding="0" width="100%" border="0" style="height: 100%">
											<tr valign="bottom">
												<td height="14">
													<img src="tours/Images/bg20.gif" width="15" height="6" border="0"></td>
												<td style="background: url(tours/Images/bg21.gif) repeat-x left bottom">
													<span class="h1">
														<img src="tours/Images/ic1.gif" width="7" height="7" border="0">
														&nbsp;&nbsp;������&nbsp;��������</span></td>
												<td>
													<img src="tours/Images/bg22.gif" width="15" height="6" border="0"></td>
											</tr>
											<tr valign="top">
												<td style="background: url(tours/Images/bg18.gif) repeat-y left top" width="15">
													<img height="1" src="tours/Images/e.gif" width="15" border="0">
												</td>
												<td width="100%" height="100%">
													<br>
													<div class="m_block1" style="overflow: hidden; width: 84%; height: auto" id="HotelCommentDiv">
														<table width="100%">
															<tr name="HotelDescription.comments$row">
																<td>
																	<b><span name="(Date.fromUTCString(HotelDescription.comments.date)).toLocaleDateString()$token"></span></b>
																	<br>
																	<span name="HotelDescription.comments.authorName$token" style="font-style: italic"></span>
																	<br>
																	<span name="HotelDescription.comments.content$token"></span>
																</td>
															</tr>
														</table>
													</div>
													<a href="#" onclick="javascript:AddComment();">�������� �����</a>
												</td>
												<td style="background: url(tours/Images/bg19.gif) repeat-y left top" width="15">
													<img height="1" src="tours/Images/e.gif" width="15" border="0">
												</td>
											</tr>
											<tr>
												<td style="height: 14px">
													<img height="14" src="tours/Images/bg15.gif" width="15" border="0"></td>
												<td style="background: url(tours/Images/bg16.gif) repeat-x left top; height: 14px;">
													<img height="1" src="tours/Images/e.gif" width="1" border="0">
												</td>
												<td style="height: 14px">
													<img height="14" src="tours/Images/bg17.gif" width="15" border="0"></td>
											</tr>
										</table>
										<!-- //������� ��� ������ ������� �������� -->
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2" id="HotelDescriptionCell">
							<!-- ��������� �������� ����� -->
							<table cellspacing="0" cellpadding="0" width="100%" border="0">
								<tr valign="bottom">
									<td height="14">
										<img src="tours/Images/bg20.gif" width="15" height="6" border="0"></td>
									<td style="background: url(tours/Images/bg21.gif) repeat-x left bottom">
										<span class="h1">
											<img src="tours/Images/ic1.gif" width="7" height="7" border="0">
											&nbsp;&nbsp;��������&nbsp;�����</span></td>
									<td>
										<img src="tours/Images/bg22.gif" width="15" height="6" border="0"></td>
								</tr>
								<tr valign="top">
									<td style="background: url(tours/Images/bg18.gif) repeat-y left top" width="15">
										<img height="1" src="tours/Images/e.gif" width="15" border="0">
									</td>
									<td width="100%">
										<div class="m_block1">
											<h2>��������� �������� �����</h2>
											<span name="HotelDescription.hotelDescription$token"></span>
											<h2>������ �����:</h2>
											<div>
												<span name="HotelDescription.hotelAttributes$row"><span name="getAttribute(HotelDescription.hotelAttributes)$token"></span>&nbsp; </span>
											</div>
											<br />
											<img src="tours/Images/bg21.gif" width="400" height="5" />
											<br />
										</div>
										<div class="m_block1">
											<h2>��������� �������� �������</h2>
											<span name="HotelDescription.roomDescription$token"></span>
											<h2>������ � ������:</h2>
											<div>
												<span name="HotelDescription.roomAttributes$row"><span name="getAttribute(HotelDescription.roomAttributes)$token"></span>&nbsp; </span>
											</div>
											<br />
											<img src="tours/Images/bg21.gif" width="400" height="5" />
											<br />
										</div>
										<div class="m_block1">
											<h2>���������� �����������</h2>
											<span name="HotelDescription.sportDescription$token"></span>
											<h2>�����:</h2>
											<div>
												<span name="HotelDescription.sportAttributes$row"><span name="getAttribute(HotelDescription.sportAttributes)$token"></span>&nbsp; </span>
											</div>
											<br />
											<img src="tours/Images/bg21.gif" width="400" height="5" />
											<br />
										</div>
										<div class="m_block1">
											<h2>��������� �������� �����</h2>
											<span name="HotelDescription.beachDescription$token"></span>
											<h2>����:</h2>
											<div>
												<span name="HotelDescription.beachAttributes$row"><span name="getAttribute(HotelDescription.beachAttributes)$token"></span>&nbsp; </span>
											</div>
											<br />
											<img src="tours/Images/bg21.gif" width="400" height="5" />
											<br />
										</div>
									</td>
									<td style="background: url(tours/Images/bg19.gif) repeat-y left top" width="15">
										<img height="1" src="tours/Images/e.gif" width="15" border="0">
									</td>
								</tr>
								<tr>
									<td height="14">
										<img height="14" src="tours/Images/bg15.gif" width="15" border="0"></td>
									<td style="background: url(tours/Images/bg16.gif) repeat-x left top">
										<img height="1" src="tours/Images/e.gif" width="1" border="0"></td>
									<td>
										<img height="14" src="tours/Images/bg17.gif" width="15" border="0"></td>
								</tr>
							</table>
							<!-- //��������� �������� ����� -->
						</td>
					</tr>
					<tr>
						<td colspan="2" id="Td1">
							<!-- ����� ��� �� ����� -->
							<form name="search" id="search" method="post">
								<table cellspacing="0" cellpadding="0" width="100%" border="0">
									<tr valign="bottom">
										<td height="14">
											<img src="tours/Images/bg20.gif" width="15" height="6" border="0"></td>
										<td style="background: url(tours/Images/bg21.gif) repeat-x left bottom">
											<span class="h1">
												<img src="tours/Images/ic1.gif" width="7" height="7" border="0">
												&nbsp;&nbsp;�����&nbsp;���&nbsp;��&nbsp;�����</span></td>
										<td>
											<img src="tours/Images/bg22.gif" width="15" height="6" border="0"></td>
									</tr>
									<tr valign="top">
										<td style="background: url(tours/Images/bg18.gif) repeat-y left top" width="15">
											<img height="1" src="tours/Images/e.gif" width="15" border="0">
										</td>
										<td width="100%">
											<div>
												<div style="margin: 5px;">
													<div id="Div2" style="float: right;">
														&nbsp;&nbsp;����������������� (�����) ��&nbsp;
														<input name="NightsFromTextBox" id="Text1" class="nights-from-text" />
														��&nbsp;
														<input name="NightsToTextBox" id="Text2" class="nights-to-text" />
													</div>
													<div id="DepartureCityComboBoxLabel">
														&nbsp;����� ������:&nbsp;
													</div>
												</div>
												<div style="margin: 5px;">
													<div id="CurrencyComboBoxLabel" style="float: right;">
													</div>
													<div id="Div4" style="float: right;">
														&nbsp;&nbsp;����&nbsp;��&nbsp;<input name="PriceFromTextBox" id="PriceFromTextBox" class="price-from-text" />&nbsp;��&nbsp;<input name="PriceToTextBox" id="PriceToTextBox" class="price-to-text" />&nbsp;&nbsp;
													</div>
													<div id="Div3">
														��������:<input name="AdultTextBox" id="AdultTextBox" class="adult-text" />&nbsp;&nbsp;����:<input name="ChildTextBox" id="ChildTextBox" class="child-text" />
													</div>
												</div>
												<div style="margin: 5px;">
													<div id="Div6" style="float: right;">
														<a href="javascript:OpenResults()">
															<img height="18" alt="������" src="tours/Images/button_search.gif" width="58" border="0"></a>
													</div>
													<div id="Div5">
														����� c:&nbsp;<input name="DateFromTextBox" id="DateFromTextBox" class="date-from-text" onchange="ChangeFirstDate()" /><img id="DateFromImage" src="tours/Images/calendar.gif" style="cursor: pointer" alt="������� ���������" />
														��&nbsp;<input name="DateToTextBox" id="DateToTextBox" class="date-to-text" /><img id="DateToImage" src="tours/Images/calendar.gif" style="cursor: pointer" alt="������� ���������" />
													</div>
												</div>
											</div>
										</td>
										<td style="background: url(tours/Images/bg19.gif) repeat-y left top" width="15">
											<img height="1" src="tours/Images/e.gif" width="15" border="0">
										</td>
									</tr>
									<tr>
										<td height="14">
											<img height="14" src="tours/Images/bg15.gif" width="15" border="0"></td>
										<td style="background: url(tours/Images/bg16.gif) repeat-x left top">
											<img height="1" src="tours/Images/e.gif" width="1" border="0"></td>
										<td>
											<img height="14" src="tours/Images/bg17.gif" width="15" border="0"></td>
									</tr>
								</table>
							</form>
						</td>
					</tr>
				</table>
			</td>
			<td style="background: url(tours/Images/bg19.gif) repeat-y left top" width="15">
				<img height="1" src="tours/Images/e.gif" width="15" border="0">
			</td>
		</tr>
		<tr>
			<td height="14">
				<img height="14" src="tours/Images/bg15.gif" width="15" border="0"></td>
			<td style="background: url(tours/Images/bg16.gif) repeat-x left top">
				<img height="1" src="tours/Images/e.gif" width="1" border="0">
			</td>
			<td>
				<img height="14" src="tours/Images/bg17.gif" width="15" border="0"></td>
		</tr>
	</table>
	<script>onloadHotelDetails();</script>