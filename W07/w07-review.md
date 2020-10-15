<h1>##7주차 학습회고</h1>


<h2>#새로 배운 내용</h2>
이번 시간에는 거의 복습을 했다.
1. 지금 쓰고 있는 실습환경
    호스트 컴퓨터 - vmware workstation player 와 visual studio code가 깔려있다.
    게스트 컴퓨터 - 가상머신 속 컴퓨터에는 ubuntu가 os로 깔려있고 웹 서버로는 apache 데이터베이스로는 mariaDB, host로부터 guest로 접근할 수 있게 만들어주는 ssh는 openssh를 사용했다.
    외부 저장소 - git hub 사용
2. SQL연습을 했다.
    sudo maria db
    use employees;
    show tables;
    이렇게 세가지를 입력하면 데이터 베이스 내부에 어떤 테이블들이 있는지 그 구조를 파악할 수 있는데, 이것을 바탕으로 쿼리를 짜서 데이터를 다루는 연습을 했다.
        select 띄우기를 원하는 요소들 
        from 가져올 테이블A
        (group by 묶는 기준이 될 요소)
        (inner join 다른 테이블명B on B의 요소 = A의 요소)
        (where 어떤 요소 = 어떤 값인 애들만)
        (order by 나열할 기준이 되는 요소 (desc 거꾸로))
    이런식으로 쿼리를 짜면 된다.
3. 직원관리시스템을 개선하는 한가지 방법을 함께 해보았다.
연봉을 가장 많이 받는 직원 n명을 뽑아 많이 받는 순으로 나열하는 기능을 추가했다.


<h2>#문제가 발생하거나 고민한 내용 + 해결 과정</h2>

<h2>#참고할 만한 내용</h2>


<h2>#회고(+,-,!)</h2>
+ 
- 
! 

<a href="https://youtu.be/Sllp1TVTRlI">과제 실행 영상</a> 자막 포함입니다

