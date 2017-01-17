<?php
/**
 * Created by PhpStorm.
 * User: TuanPham
 * Date: 1/17/2017
 * Time: 9:21 AM
 */
use common\models\News;

?>
<!--<div class="main ovfh">-->
<div class="main ovfh">
    <div class="main-section container">
        <div class="main-title tac ttu">
            <span class="segoeui">Vinpearl Condotel</span>
            <h2 class="utm-trajan">Lợi ích đầu tư</h2>
        </div>
        <ul class="benef-main-list">
            <?php
            if(isset($listNews) && !empty($listNews)){
                foreach($listNews as $item) {
                    /** @var  $item News*/
                    ?>
                    <li>
                        <div class="benef--box">
                            <div><img width="96" height="96" src="<?= $item->getImage() ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                      alt="<?= $item->title ?>" /></div>
                            <div class="benef--box--text">
                                <h3><?= $item->title ?> <span></span></h3>
                                <div><p><?= $item->content ?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }else{
            ?>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/CHÍNH-SÁCH-VAY-65.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="CHÍNH SÁCH VAY 65%" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/CHÍNH-SÁCH-VAY-65-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/CHÍNH-SÁCH-VAY-65.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Chính sách vay 65%, chỉ 700 triệu đồng đã có thể đầu tư <span></span></h3>
                        <div><p>Hợp tác chiến lược với các ngân hàng – Vingroup đã đưa ra gói vay ưu đãi mà chưa từng có dự án BĐS nào khác có được. Khi mua condotel Vingroup, khách hàng được hỗ trợ vay lên tới 65% với lãi suất 0% trong 12 tháng đầu tiên, phí trả nợ trước hạn 0% trong 12 tháng đầu tiên, ân hạn nợ gốc trong 12 tháng. Cam kết chia sẻ lợi nhuận được thực hiện 6 tháng/lần kể từ khi thanh toán 100%.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/VỊ-TRÍ-VÀNG.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="VỊ TRÍ VÀNG" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/VỊ-TRÍ-VÀNG-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/VỊ-TRÍ-VÀNG.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Vị trí vàng trên bãi biển đẹp nhất hành tinh <span></span></h3>
                        <div><p>Nếu như vị trí là yếu tố quan trọng nhất tạo nên giá trị cho BĐS thì các dự án du lịch nghỉ dưỡng của thương hiệu Vinpearl đều tọa lạc tại những bãi biển đẹp nhất hành tinh. Dự án Vinpearl Empire Condotel được xây dựng trên vị trí vàng tại thành phố du lịch biển số 1 của Việt Nam, thu hút khách du lịch trong và ngoài nước &#8211; Nha Trang. Có thể nói đây thực sự là thiên đường nghỉ dưỡng hàng đầu của Việt Nam và khu vực. Các căn hộ của dự án đều có tầm nhìn hướng biển hay bao trọn cảnh quan thành phố.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/KÊNH-ĐẦU-TƯ-SINH-LỜI.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="KÊNH ĐẦU TƯ SINH LỜI" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/KÊNH-ĐẦU-TƯ-SINH-LỜI-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/KÊNH-ĐẦU-TƯ-SINH-LỜI.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Condotel – Kênh đầu tư sinh lời cao nhất, an toàn nhất <span></span></h3>
                        <div><p>Các kênh đầu tư hiện nay bao gồm gửi tiết kiệm ngân hàng với lãi suất tiền việt dao dộng từ 5 tới 7%/1 năm và còn canh cánh trong lòng nỗi lo trượt giá. Đầu tư vàng hay ngoại tệ, chứng khoán không còn là sự lựa chọn số 1 khi biến động giảm liên tục, khả năng lướt sóng đầu tư không còn. Nhà phố hay chung cư bình dân không còn sở hữu lợi thế thanh khoản và sinh lời cao khi mà nguồn cung các dự án mới ra mắt liên tục, khách hàng đều có cơ hội mua trực tiếp từ Chủ đầu tư. Đầu tư nhà phố, chung cư bình dân cho thuê cũng đang mất dần vị trí là kênh đầu tư số 1 khi lượng nhà cho thuê quá nhiều, giá thuê thấp dần, công suất cho thuê không ổn định đã khiến mức sinh lời trung bình của kênh này chỉ ở mức 3.8%/1 năm/ Chỉ với những khu đô thị cao cấp như Vinhomes thì giá thuê căn hộ bình dân mới lên mức 9-10%.</p>
                            <p>Trong khi đó, Vingroup đưa ra chính sách chia sẻ với chủ sở hữu 85% lợi nhuận từ việc kinh doanh cho thuê lại căn hộ khách sạn trọn đời và đây là số tiền khách hàng thực nhận sau khi đã trừ đi toàn bộ chi phí vận hành, quản lý. Vingroup cũng là Chủ đầu tư duy nhất hiện nay đưa ra cam kết đảm bảo lợi nhuận kinh doanh condotel tối thiểu 10%/năm cho khách hàng trong 5 năm.</p>
                            <p>Cam kết sinh lời tối thiểu 50% trong 5 năm là mức cam kết sinh lời cao nhất hiện nay trong số các kênh đầu tư khác giúp các nhà đầu tư có thể hoàn toàn yên tâm về lợi nhuận cũng như sự ổn định, an toàn cho khoản tiền đầu tư vào condotel Vingroup.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/UY-TÍN-CHỦ-ĐẦU-TƯ.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="UY TÍN CHỦ ĐẦU TƯ" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/UY-TÍN-CHỦ-ĐẦU-TƯ-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/UY-TÍN-CHỦ-ĐẦU-TƯ.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Uy tín Chủ đầu tư <span></span></h3>
                        <div><p>Vinpearl Condotel là sản phẩm của tập đoàn Vingroup, Tập đoàn tư nhân lớn nhất và uy tín nhất Việt Nam, hoạt động trong các lĩnh vực then chốt của nền kinh tế như: Bất động sản; Khách sạn &#8211; Du lịch; Vui chơi – Giải trí; y tế; Giáo dục; Thương mại điện tử; Trung tâm thương mại; Kinh doanh bán lẻ&#8230; và gần đây nhất trong lĩnh vực Nông nghiệp.</p>
                            <p>Với 6 chữ vàng là kim chỉ nan trong mọi suy nghĩ, hành động: Tín &#8211; Tâm &#8211; Trí &#8211; Tốc &#8211; Tinh &#8211; Nhân, ở bất cứ lĩnh vực nào khi tham gia, Vingroup đều giữ vững vai trò người tiên phong tạo ra xu hướng mới và dẫn dắt sự thay đổi với việc đem đến cho thị trường những sản phẩm – dịch vụ theo tiêu chuẩn quốc tế.</p>
                            <p>Với Chữ Tâm chân thành Vì một cuộc sống tốt đẹp hơn cho người Việt, từng con người Vingroup đã và đang giữ vững Nhân cách, luôn mở rộng học hỏi những Trí tuệ của nhân loại để mang tới những sản phẩm Tinh hoa nhất cho khách hàng. Nói là làm, Tốc độ của những hành động đã và đang là cam kết về chữ Tín đối với khách hàng.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐẦU-TƯ-QUẢN-LÝ-BỞI-VINPEARL.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="ĐẦU TƯ QUẢN LÝ BỞI VINPEARL" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐẦU-TƯ-QUẢN-LÝ-BỞI-VINPEARL-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐẦU-TƯ-QUẢN-LÝ-BỞI-VINPEARL.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Đầu tư quản lý bởi Vinpearl <span></span></h3>
                        <div><p>Được quản lý bởi Vinpearl, thương hiệu nghỉ dưỡng sở hữu chuỗi khách sạn 5 và 6 sao được khách hàng yêu thích nhất. Để mang đến công suất phòng lên tới 95 -100%, Tập đoàn Vingroup đã có bước đi chiến lược khi hợp tác cùng các hãng lữ hành trong nước và quốc tế để Vinpearl luôn là sự lựa chọn đầu tiên của các đoàn khách du lịch lớn. Với vị thế và công suất phòng ở mức cao như hiện nay của Vinpearl, cam kết sinh lời tối thiểu 10%/năm trong 5 năm chỉ là mức cam kết để giúp khách hàng yên tâm đầu tư. Thực tế kinh doanh đã chứng minh, đầu tư condotel Vingroup có thể mang lại con số sinh lời cao hơn mức cam kết này rất nhiều.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/top_1-1.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="top_1 (1)" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/top_1-1-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/top_1-1.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Phối hợp kinh doanh bởi Vinhomes – Top 1 thương hiệu BĐS VN <span></span></h3>
                        <div><p>Được phối hợp kinh doanh bởi Vinhomes – Thương hiệu bất động sản đắt giá nhất Việt Nam do hãng tư vấn định giá hàng đầu thế giới Brand Finance công bố. Vinhomes là Chủ đầu tư hàng loạt dự án khu đô thị cao cấp đã và đang triển khai như Vinhomes Times City, Vinhomes Royal City, Vinhomes Riverside, Vinhomes Central Park… Các sản phẩm bất động sản được kinh doanh bởi Vinhomes luôn đảm bảo chính xác cam kết về tiến độ, chất lượng xây dựng và hệ thống hạ tầng, tiện ích đồng bộ và chất lượng dịch vụ, đảm bảo môi trường sống văn minh và an toàn.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/SẢN-PHẨM-ĐẠT-TIÊU-CHUẨN-5-SAO.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="SẢN PHẨM ĐẠT TIÊU CHUẨN 5 SAO" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/SẢN-PHẨM-ĐẠT-TIÊU-CHUẨN-5-SAO-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/SẢN-PHẨM-ĐẠT-TIÊU-CHUẨN-5-SAO.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Sản phẩm đạt tiêu chuẩn 5 sao trọn đời <span></span></h3>
                        <div><p>Bất động sản nhà ở cho thuê thường xuyên phải bảo trì định kỳ, chủ nhà phải tự chi trả các khoản phí cho các hư hại, xuống cấp&#8230; Với condotel Vingroup, các căn căn hộ khách sạn được Chủ đầu tư cam kết thường xuyên được bảo trì, bảo dưỡng nên luôn đảm bảo đủ tiêu chuẩn 5 sao. Đặc biệt, Chủ đầu tư là đơn vị sẽ chịu trách nhiệm chi trả các khoản chi phí bảo trì, bảo dưỡng trong quá trình vận hành</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/THỤ-HƯỞNG-HỆ-SINH-THÁI-NGHỈ-DƯỠNG.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="THỤ HƯỞNG HỆ SINH THÁI NGHỈ DƯỠNG" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/THỤ-HƯỞNG-HỆ-SINH-THÁI-NGHỈ-DƯỠNG-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/THỤ-HƯỞNG-HỆ-SINH-THÁI-NGHỈ-DƯỠNG.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Thụ hưởng hệ sinh thái nghỉ dưỡng Vinpearl với tiện ích 5 sao <span></span></h3>
                        <div><p>Điều khác biệt hoàn toàn so với các dự án nghỉ dưỡng của các Chủ đầu tư khác, Vinpearl Condotel là thương hiệu của Tập đoàn Vingroup nên khách nghỉ tại đây được thụ hưởng hệ sinh thái nghỉ dưỡng Vinpearl Nha Trang với sân Golf tiêu chuẩn quốc tế, khu vui chơi giải trí Vinpearl Land (trên đảo Hòn Tre), Bệnh viện Đa khoa Quốc tế Vinmec. Được xây dựng và triển khai đồng bộ, rõ ràng Vinpearl Beachfront Condotel tự mang trong mình những điểm mạnh mà không có dự án nào khác tại Việt Nam so sánh được.</p>
                            <p>Đặc biệt, cảnh quan thiên nhiên Nha Trang kỳ vĩ luôn đứng top đầu thế giới với Vịnh Nha Trang là một trong số 29 vịnh trên thế giới được câu lạc bộ các vịnh đẹp nhất trên thế giới xếp hạng và chính thức công nhận vào tháng 7/2003. Cùng với vịnh Hạ Long, vịnh Nha Trang là vịnh thứ hai của Việt Nam được xếp hạng.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/sp.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="sp" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/sp-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/sp.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Sản phẩm đa dạng đáp ứng nhu cầu đầu tư <span></span></h3>
                        <div><p>Condotel Vingroup được thiết kế ưu việt với tiện ích vượt trội nhằm đáp ứng nhu cầu đầu tư đa dạng của khách hàng. Dự án được quy hoạch hoàn hảo đểm đảm bảo 100% các căn hộ đều có tầm nhìn hướng biển hay bao trọn cảnh quan thành phố. Gồm 1 tới 4 phòng ngủ có các diện tích tiêu chuẩn từ 40 tới 125 m2, tất cả các căn căn hộ đều có khoảng không gian rộng mở để đón gió và ánh sáng tự nhiên.</p>
                            <p>Hệ thống tiện ích 5 sao bao gồm: Nhà hàng buffet châu Á, châu Âu sang trọng; Grand ballroom, phòng họp (Lớn và nhỏ); Bar, sảnh Lounge, bể bơi, bể Jacuzzi, Gym, Spa, Kid Club, Café, VIP Club</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐƯỢC-TƯ-VẤN-THIẾT-KẾ-BỞI-ĐƠN-VỊ-QUỐC-TẾ.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="ĐƯỢC TƯ VẤN THIẾT KẾ BỞI ĐƠN VỊ QUỐC TẾ" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐƯỢC-TƯ-VẤN-THIẾT-KẾ-BỞI-ĐƠN-VỊ-QUỐC-TẾ-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐƯỢC-TƯ-VẤN-THIẾT-KẾ-BỞI-ĐƠN-VỊ-QUỐC-TẾ.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Được tư vấn thiết kế bởi đơn vị quốc tế <span></span></h3>
                        <div><p>Với mong muốn mang đến cơ hội trải nghiệm nghỉ dưỡng tiêu chuẩn quốc tế, Vinpearl Condotel được thuê tư vấn thiết kế bởi Aedas – Đơn vị hàng đầu thế giới với trụ sở tại khắp châu Á, châu Âu, Trung Đông và Mỹ và hàng loạt công trình nổi tiếng: khu căn hộ cao cấp 8 sao Napier (Singapore), trụ sở hãng truyền thông Axel Springer (Berlin – Đức), Aylesbury Waterside Theatre (Anh), Boulevard Plaza (Dubai)</p>
                            <p>Những dự án đang được Aedas thực hiện bao gồm: Theatre Royal Drury Lane (London – Anh), The Residences at Marina Gate (Dubai)…</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/TẶNG-15-ĐÊM-NGHỈ-VILLAS.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="TẶNG 15 ĐÊM NGHỈ VILLAS" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/TẶNG-15-ĐÊM-NGHỈ-VILLAS-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/TẶNG-15-ĐÊM-NGHỈ-VILLAS.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Tặng 15 đêm nghỉ/năm <span></span></h3>
                        <div><p>Ngoài ra quyền lợi về tài chính, chủ nhân căn hộ khách sạn còn được tặng 15 đêm nghỉ/năm tại các phòng khách sạn 5 sao trên toàn hệ thống Vinpearl Hotel &amp; Resort tại Đà Nẵng, Nha Trang, Phú Quốc và gần đây là Vinpearl Hạ Long Bay Resort khai trương ngày 31/10/2015. Hệ thống này sẽ còn tiếp tục mở rộng tại những bờ biển đẹp nhất Việt Nam. Một điều tuyệt vời nữa, khách hàng có thể chia sẻ đêm nghỉ này với bạn bè, người thân hay đối tác của mình. Chủ đầu tư cam kết rằng, họ cũng được nhận những đặc quyền như chính chủ nhân căn căn hộ khách sạn.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ti___n______.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="ti___n______" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ti___n______-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ti___n______.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Tiến độ bàn giao đúng thời hạn cam kết <span></span></h3>
                        <div><p>Cùng dòng sản phẩm BĐS nghỉ dưỡng, các biệt thự biển mang thương hiệu Vinpearl Resort &amp; Villas ra đời trước Condotel chỉ hơn 10 tháng nhưng đến nay từng dự án đã lần lượt được bàn giao, hiện thực hóa cam kết lợi nhuận cho các nhà đầu tư, tô điểm thêm bản đồ du lịch Việt Nam và hình thành thiên đường nghỉ dưỡng lý tưởng cho các khách du lịch. Khẳng định uy tín tên tuổi của chủ đầu tư và cam kết mạnh mẽ về tốc độ, tiến độ của dự án với khách hàng</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐẦU-TƯ-CHO-TƯƠNG-LAI.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="ĐẦU TƯ CHO TƯƠNG LAI" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐẦU-TƯ-CHO-TƯƠNG-LAI-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/01/ĐẦU-TƯ-CHO-TƯƠNG-LAI.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Đầu tư cho tương lai <span></span></h3>
                        <div><p>Đầu tư condotel Vinpearl Condotel đảm bảo được tính an toàn và sinh lời ổn định không chỉ cho khách hàng mà còn cho thế hệ tương lai, con cháu của chúng ta. Với mức cam kết sinh lời 10%/năm trong 5 năm và chia sẻ 85% lợi nhuận cho thuê trọn đời, đây là một sản phẩm đầu tư tài sản sinh lợi kép: vừa đảm bảo giá trị đầu tư bằng BĐS lâu dài và chắc chắn, lợi nhuận kinh doanh ổn định ở mức cao và cơ hội tăng giá chắc chắn trong tương lai.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/06/sp.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="sp" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/06/sp-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/06/sp.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Sản phẩm đa dạng đáp ứng nhu cầu đầu tư <span></span></h3>
                        <div><p>Condotel Vingroup được thiết kế ưu việt với tiện ích vượt trội nhằm đáp ứng nhu cầu đầu tư đa dạng của khách hàng. Dự án được quy hoạch hoàn hảo đểm đảm bảo 100% các căn hộ đều có tầm nhìn bao trọn cảnh quan thành phố. Gồm 1 tới 4 phòng ngủ có các diện tích tiêu chuẩn từ 40 tới 125 m2, tất cả các căn căn hộ đều có khoảng không gian rộng mở để đón gió và ánh sáng tự nhiên.</p>
                            <p>Hệ thống tiện ích 5 sao bao gồm: Nhà hàng buffet châu Á, châu Âu sang trọng; Grand ballroom, phòng họp (Lớn và nhỏ); Bar, sảnh Lounge, bể bơi, bể Jacuzzi, Gym, Spa, Kid Club, Café, VIP Club</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/06/VỊ-TRÍ-VÀNG.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="VỊ-TRÍ-VÀNG" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/06/VỊ-TRÍ-VÀNG-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/06/VỊ-TRÍ-VÀNG.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Vị trí vàng trên bãi biển đẹp nhất hành tinh <span></span></h3>
                        <div><p>Nếu như vị trí là yếu tố quan trọng nhất tạo nên giá trị cho BĐS thì các dự án du lịch nghỉ dưỡng của thương hiệu Vinpearl đều tọa lạc tại những bãi biển đẹp nhất hành tinh. Dự án Vinpearl Beachfront Condotel được xây dựng trên đường Trần Phú, vị trí vàng tại thành phố du lịch biển số 1 của Việt Nam, thu hút khách du lịch trong và ngoài nước &#8211; Nha Trang. Có thể nói đây thực sự là thiên đường nghỉ dưỡng hàng đầu của Việt Nam và khu vực. Các căn hộ của dự án đều có tầm nhìn hướng biển hay bao trọn cảnh quan thành phố.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="benef--box">
                    <div><img width="96" height="96" src="http://vinpearl-condotel.vn/wp-content/uploads/2016/06/THỤ-HƯỞNG-HỆ-SINH-THÁI-NGHỈ-DƯỠNG.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="THỤ-HƯỞNG-HỆ-SINH-THÁI-NGHỈ-DƯỠNG" srcset="http://vinpearl-condotel.vn/wp-content/uploads/2016/06/THỤ-HƯỞNG-HỆ-SINH-THÁI-NGHỈ-DƯỠNG-70x70.png 70w, http://vinpearl-condotel.vn/wp-content/uploads/2016/06/THỤ-HƯỞNG-HỆ-SINH-THÁI-NGHỈ-DƯỠNG.png 96w" sizes="(max-width: 96px) 100vw, 96px" /></div>
                    <div class="benef--box--text">
                        <h3>Thụ hưởng hệ sinh thái nghỉ dưỡng Vinpearl với tiện ích 5 sao <span></span></h3>
                        <div><p>Vinpearl Riverfront Condotel sở hữu hàng loạt tiện ích 5 sao thời thượng như Spa, Gym, Skybar, Bể bơi bốn mùa, Nhà hàng Buffet&#8230; Bên cạnh đó, cơn khát shopping của các &#8220;tín đồ&#8221; hàng hiệu sẽ dễ dàng được giải tỏa với trung tâm thương mại Vincom Ngô Quyền Plaza ngay bên cạnh. Được xây dựng và triển khai đồng bộ, rõ ràng Vinpearl Riverfront Condotel tự mang trong mình những điểm mạnh mà ít có dự án nào khác tại Việt Nam so sánh được.</p>
                            <p>Đặc biệt, New York Times bình chọn Đà Nẵng là 1 trong những điểm đến lý tưởng trên thế giới vào năm 2015. Con người thân thiện, điểm du lịch đa dạng, Đà Nẵng mỗi năm thu hút một lượng khách rất lớn. Với tiềm năng to lớn, Đà Nẵng chính là nơi mà bất kì nhà đầu tư bất động sản nghỉ dưỡng sành sỏi nào cũng phải sở hữu một tài sản cho riêng mình.</p>
                        </div>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        <div class="view-more-page tac"><a class="tuu segoeui" href="#">Xem thêm<span></span></a></div>
    </div>
