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
4. git pull origin master로 먼저 깃에 다른 프로그래머가 업데이트 한 것을 받아와야한다는 것을 배웠다.

<h2>#문제가 발생하거나 고민한 내용 + 해결 과정</h2>
1. 
    $query = "
        SELECT emp_no, first_name, last_name, hire_date, title
        FROM employees
        inner join titles on titles.emp_no = employees.emp_no
        where year(hire_date)=".$filtered_year."
    "; 쿼리를 이렇게 작성했더니
mysqli_fetch_array() expects parameter 1 to be mysqli_result, bool given in /var/www/html/W07-P/hire_date_info.php on line 21

Warning: mysqli_free_result() expects parameter 1 to be mysqli_result, bool given in /var/www/html/W07-P/hire_date_info.php on line 35
처음 작성을 하고났더니 이렇게 오류가 났다. 그래서 일단 employees와 titles 테이블 합쳐놓은 것을 풀고 진행했다.
그 후 다시     echo mysqli_error($link);로 확인해보니, emp_no가 모호하다고 떴다.
그래서 $query = "
        SELECT employees.emp_no, first_name, last_name, hire_date, title
        FROM titles
        left join employees on employees.emp_no = titles.emp_no
        where year(hire_date)=".$filtered_year."
    ";

    이렇게 emp_no를 employees.emp_no로 수정했다. 그렇게 하니 잘 작동되었다.

2. 맨 위에 해당년도 에 입사한 직원숫자를 띄우려고 했는데, select count(*)의 결과를 바로 html에서 띄우려고 했는데 잘 되지않았다.
    $query = "
        SELECT count(*)
        FROM employees
        where year(hire_date)=".$filtered_year."
    ";
    $result_count = mysqli_query($link, $query);
    $count = $result_count['count(*)'];
이런 식으로 해봤는데 이후에 $count가 출력이 되지않아서 고민했다.

해결: 
$result_count = mysqli_query($link, $query);
    print_r($count = mysqli_fetch_array($result_count));
이런 식으로 print_r로 mysqli_fetch_array($result_count)의 출력값을 확인했다. 그런 다음에 html에서 
총 <?=$count['count(*)']?> 명
으로 코드를 써서 출력했다

3. 두번째로 구현했던 기능에서는
SELECT dept_name, count(*)
        FROM dept_emp
        left join departments departments.dept_no = dept_emp.dept_no
        where to_date='9999-01-01'
        group by dept_name
        order by dept_name

        이렇게 쿼리를 짰는데, 오류가 났다. 1에서와 마찬가지로 echo mysqli_error($link);로 확인해보니 join에서 on이 빠져있었다. 그래서 수정하니 잘 동작했다.

<h2>#참고할 만한 내용</h2>
막힐때마다 검색은 해보았지만 특별히 참고한 사이트는 없다. echo mysqli_error($link); 와 print_r($OOO) 이 두 함수가 잘 기억나지 않아서 2주차 강의 자료를 다시 살펴보았다.

<h2>#회고(+,-,!)</h2>
+ echo mysqli_error($link), print_r 두가지를 활용하여 과제의 오류를 비교적 빠르고 쉽게 해결한 것 같아서 뿌듯했다.
- 마지막으로 데이터베이스 쿼리문을 다뤘던게 작년 2학기여서 그런지 좀 가물가물했다.  중간고사가 끝나고나서 데이터베이스 개론 책을 다시 빨리 훑어봐야겠다.
! 

<a href="https://youtu.be/Sllp1TVTRlI">과제 실행 영상</a> 자막 포함입니다

