<h1>##CORONA19 데이터 분석 사이트 소개 페이지</h1>

<h2>#개발 환경</h2>

<h3> 1. 사용한 데이터베이스: MariaDB </h3>
    
    MariaDB와 MySQL 중에서 MariaDB를 선택한 이유:
    * MySQL은 상업적으로 사용할 경우 유료인데 반해 MariaDB는 무료이다.
    * 현재 MySQL보다  MariaDB가 더 빨리, 먼저 개발되는 경향이 있어 좀 더 최신 기술을 쓸 수 있다.
    * MariaDB가 더 많이 쓰이기 때문에 나중에 개발자가 되어 개발할 때 사용하게 될 일이 더 많을 것으로 예상되어 선택했다.

<h3>2. 사용한 백엔드 서버 사이드 언어: PHP</h3>

<h3>3. 사용한 프론트엔드 클라이언트 사이드 언어: HTML(CSS)</h3>

    (※ PHP와 HTML은 이 이외의 선택지가 없으므로, 타 언어와 비교한 장점이나 선택 이유가 특별히 없습니다.)


<h3>4. 사용한 웹 서버: 리눅스와 그 안에서 돌아가는 Apache</h3>
    리눅스를 웹 서버 OS로 선택한 이유:
    * 윈도우보다 보안성이 높다
    * 윈도우가 유료인 반면 리눅스OS는 무료이다.
    * 리눅스는 처리 속도도 윈도우보다 빠르다.
    * 위와 같은 이유들로 인해 리눅스OS의 서버가 회사에서 Windows OS보다 서버로서 더 많이 사용된다.


<h3>5.  사용한 데이터: 캐글의 Novel Corona Virus 2019 DATASET</h3>
        링크: https://www.kaggle.com/sudalairajkumar/novel-corona-virus-2019-dataset

        샘플 데이터베이스를 사용하지 않고 캐글을 사용한 이유:
        요즘 전세계적으로 가장 핫한 이슈인 COVID-19에 대한 최신 데이터를 다뤄보고 싶어서 www.kaggle.com에서 자료를 가져왔다.

        캐글을 위해 추가로 설치한 프로그램 및 파일들:
         1. pip3
         2. Kaggle API
         3. kaggle.json


<h2>#발견한 정보에 대한 소개</h2>
※아래 설명문에서 최신 정보는 2020.09.23에 업데이트 된 정보를 의미한다.
<br/><br/><br/>
1. 전지역 최신 확진자 정보<br/>
    첫번째 항목을 클릭하면  모든 나라의 모든 지역의 최신 확진자, 사망자, 회복자 정보가 나온다.<br/>
    정렬 순서는 나라의 알파벳으로 결정된다.(A~Z)<br/><br/>
    <img width='600' src = 'https://user-images.githubusercontent.com/42990328/97802815-68d7c300-1c89-11eb-8b6b-dc822b90738b.png'>
<br/><br/><br/>
2. 날짜별 각국 확진 정보<br/>
    날짜를 선택한 후 검색하면 해당 날짜의 모든 지역의 코로나 감염자에 대한 정보를 볼 수 있다.<br/>
    나라 - 지역 - 확진자 수- 사망자 수- 회복한 사람 수 순서로 출력된다.
<br/><br/>
    <img width='600' src = 'https://user-images.githubusercontent.com/42990328/97802816-68d7c300-1c89-11eb-9478-8d937ef381e1.png'><br/>
    날짜를 이렇게 선택한다.
<br/>
    <img width='600' src = 'https://user-images.githubusercontent.com/42990328/97802818-69705980-1c89-11eb-848b-74772f4b7fef.png'><br/>
    그 날에 해당하는 정보를 볼 수 있다.
<br/><br/><br/>
3. 나라 이름으로 정보 검색하기<br/>
    링크를 타고 검색 페이지로 이동한 후 나라 이름 리스트를 참고하여 특정 나라의 최신 정보를 검색할 수 있다.
<br/><br/>
    <img width='600' src = 'https://user-images.githubusercontent.com/42990328/97802817-69705980-1c89-11eb-9d69-f155f90d661c.png'><br/>
    검색페이지. 아래에 있는 나라 이름 리스트에서 원하는 나라를 선택해 검색할 수 있다.
    <br/><br/>
    <img width='600' src = 'https://user-images.githubusercontent.com/42990328/97802819-6a08f000-1c89-11eb-80d0-8920e88d6a60.png'><br/>
    위 예시 사진은 Canada로 검색한 결과이다.<br/> South Korea의 경우 지역별로 데이터가 나눠져있지 않아<br/> 지역이 빈칸으로 된 한가지 결과만 출력되어서 Canada를 예시로 사용했다.
<br/><br/>
+ 메인 페이지(index)에 확진자가 많은 지역 Top10, 사망자가 많은 지역 Top10 출력<br/>
네이버 데이터랩에 실시간 검색어 Top10이 뜨듯이, 메인 페이지에 확진자와 사망자가 가장 많은 지역 Top10이 출력된다.<br/>
    <img width='600' src = 'https://user-images.githubusercontent.com/42990328/97802820-6a08f000-1c89-11eb-9731-0144d74547a9.png'><br/>
    <img width='600' src = 'https://user-images.githubusercontent.com/42990328/97802813-67a69600-1c89-11eb-8394-5678a550399a.png'><br/>
<br/>
<br/>
<h2>#동작 화면 소개 영상</h2>
<a href="">동작 영상</a><br/>
    자세한 설명은 자막을 참조하세요.