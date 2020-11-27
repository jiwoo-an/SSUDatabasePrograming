..
<h2>#새로 배운 내용</h2>
1. Apache Tomcat : 윈도우에서 Java Server Page를 사용하게 해주는 서버 <br/>
2. Tomcat에서 사용하는 포트 번호를 바꾸는 방법: apache-tomcat파일 내에 conf-server.xml로 이동하여 port = "8080"부분을 검색하여 원하는 숫자로 바꾼다<br/>
3. java에선 system.out을 사용해서 출력을 했는데, jsp파일에서 출력을 위해 사용하는 것은 내장객체다. 다음과 같은 코드로 출력할 수 있다.out.println("태그입력");<br/>
4. 이클립스에서 try-catch문을 통해 데이터베이스를 접속할 때, catch문에서 SQL의 Exception을 처리하는 방법 중에서, 오라클에서 제공하는 에러코드 중 무엇이 발생했는지에 따라 다른 메시지를 출력하는 방법을 배웠다.<br/>
  ex) catch (SQLException e){<br/>
      out.print("연결 실패 : ");<br/>
      if(e.getMessage().indexOf("ORA-28009") > -1)<br/>
        out.println("허용되지 않는 접속 권한 없음");<br/>
      else if(e.getMessage().indexOf("ORA-01017") > -1)<br/>
        out.println("유저/패스워드 확인");<br/>
        ...<br/>
      else <br/>
        out.println("기본 연결확인!");<br/>
    }// 여기서 ORA-28009, ORA-01017 오라클의 기본 제공 에러코드이다.<br/>
<br/>
5. JSP(Java Server Page)란? HTML 내부에 java코드를 입력하여 웹 서버에서 동적으로 웹 브라우저를 관리하는 언어 <br/>
  컨트롤러로서 Servlet을 사용하고 보여지는 뷰 단에서 JSP 페이지를 사용한다. 뷰 내부의 모델로는 JavaBeans를 사용해서, 웹 브라우저에서 보여준다.<br/>
  <br/>
  JSP 구성요소:<br/>
  1. 템플릿 데이터(클라이언트에게 출력되는 콘텐츠. HTML, XML 등)<br/>
  2. JSP 전용 태그(ex. <%@ %> , <% %>, <%= %>)<br/>
  3. JSP 내장 객체(JSP에서 별도의 선언없이 사용 가능한 9개의 객체)<br/><br/>
6. HTML에서 post형식으로 보낸 form을 JSP에서 받을때, JSP 내장객체 중에서 request를 사용한다.<br/>
    ex) request.setCharacterEncoding("UTF-8"); <br/>
      String employee_id = request.getParameter("employee_id");<br/>
      String first_name = request.getParameter("first_name");<br/>
      String last_name = request.getParameter("last_name");<br/>
      ...<br/>
7. 앱 개발할 때, 앱의 패키지 명은 고유한 이름으로 작성되어야한다. <br/>전세계의 모든 다른 앱들과 구분할 수 있게. 그래서 가장 많이 사용하는 방법은, url주소를 거꾸로 하는 것이다.<br/>
ex) kr.ac.sungshin.w13<br/>

<h2>#문제가 발생하거나 고민한 내용 + 해결과정</h2>
1. 이클립스에서 오라클과 연결할 때, 오라클을 키고 ConnectionTest버튼을 누르면 Ping Failed가 떴다. 슬랙을 확인해보니 같은 오류를 경험한 학생이 있어서 그것을 참고하여 server을 localhost로 바꾸어서 진행했다. 교수님께서 실습에서 오라클을 개인 컴퓨터에 설치하기 때문에 Host는 localhost 로 설정해야 한다고 알려주셨다.

2. 직원 수정을 만들 때, 수정화면에서 원래 데이터가 뭐였는지 띄워주고 싶었다. String employee_id = request.getParameter("employee_id");로 불러온 employee_id는 수정화면에 잘 떴지만
pstmt = conn.prepareStatement(sql);	
		rs = pstmt.executeQuery();
			first_name = rs.getString("first_name");
			last_name = rs.getString("last_name");
			email = rs.getString("email");
			phone_number = rs.getString("phone_number");
			salary = rs.getString("salary");
이렇게 불러온 모든 값이 뜨지않았다. ResultSet.next()가 호출되지않았음이라는 알림이 떠서 검색해보니, while(rs.next())를 사용해서 rs.next()를 호출하면 된다는 것을 알게되었다.


<h2>#참고할만한 내용</h2>
     1. 슬랙의 다른 학생 질문과 교수님 답변을 참조했다. https://dbpss2020-2nd.slack.com/archives/C019CJZ3RF1/p1606220977003200
     2. ResultSet.next()가 호출되지 않았음이라는 알림이 뜨면 rs.getString~ 이전에 While(rs.next()), if(rs.next()), re.next()중에 하나를 해주면 된다고 아래 출처에서 알려주었다.
 출처: https://acua.tistory.com/entry/ResultSetnext가-호출되지-않았음 [지옥에서 천국까지]
     
     
<h2>#회고 (+-!)</h2>
+: 수정보다 삭제가 쉬워보였지만 그래도 익숙하지 않은 jsp를 쓰니까 지금 강의에서 배울 때 더 잘 다뤄보고 싶어서 수정을 선택해서 진행했기때문에 성공했을 때 더 보람이 있었다.

-: 자바파일은 대문자로 시작하는 것이 좋다고 한다. 계속 쓰는 언어에서는 형식이 헷갈리지 않는데, 몇 달만 안쓰면 금방 이런 것들을 잊어버린다. 주의해서 잘 외워야겠다.

!:  전에 썼지만 잊어버렸던 코드를 다시 찾을 때 git이 정말 편했다. 자잘한 문법은 잊어버렸어도 내가 어떤 파일에 어떤 걸 해서 넣어놨는지는 기억이 나기 때문이다. 개발자에게 git이 왜 좋다는건지 좀 알게 되었다. 
    
    
<h2>#동작 화면 영상</h2>
<a href="https://youtu.be/S4Meuhcgteg">클릭</a>
