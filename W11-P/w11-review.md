<h2>#새로 배운 내용</h2>
   1. select update insert delete 메서드 안에서 db를 연결해서 사용하고 난 자원들(Connection, Statement, ResultSet객체)는 반납해야한다.</br>
   그렇지 않으면 DB서버가 그 결과를 계속 저장하고 있어서 메모리가 낭비되기 때문이다. 그런데 이 반납을 모든 메서드 내에서 일일이 반납하면 코드가 반복되어서
   이 반납하는 코드들을 clossAll() 메서드로 묶었다.
    
    public void clossAll(Connection conn, PreparedStatement psmt, ResultSet rs) {
            try {
              if (rs != null) rs.close();
              if(psmt != null) psmt.close();
              if(conn != null) conn.close();
              System.out.println("\nAll closed");
            }catch(SQLException sqle) {
              System.out.println("\nError!!");
              sqle.printStackTrace();
            }
   
   그리고select update insert delete메서드 안의 try catch문 맨 마지막에 finally를 붙여서 이 안에서 closeAll()을 사용했다. 
   
   
      try {
				conn = this.getConnection();
				psmt = conn.prepareStatement(sql);
				int count = psmt.executeUpdate();
				System.out.println("\n"+count + " -정보가 어떻게 변경됐는지 출력하는 부분-");
			} catch (SQLException e) {
				e.printStackTrace();
			}finally {
				this.clossAll(conn, psmt, null);
			}
    
    
  2. Statement VS PreparedStatement
  Statement와 비교했을 때, PreparedStatement의 5가지 장점에 대해서 배웠다.
   
     - 한번 사용된 SQL을 재사용 할 수 있다.
      - 미리 컴파일해둬서 빠르다
      - 동적 쿼리를 할 수 있다.
      - ""나 ''같은 기호에 신경쓸 필요가 없다. 이걸로 인한 오류가 없다.
      - 보안 공격을 막을 수 있다.




<h2>#문제가 발생하거나 고민한 내용 + 해결과정</h2>

      거의 수업내용 그대로 쓰고 쿼리문만 바꿨는데, 빨간줄은 안생겼는데 실행해보니 오류가 줄줄이 났다 맨 윗줄의 경고문을 확인해보니
      <br/> java.sql.SQLSyntaxErrorException: ORA-00904: "KR": invalid identifier라고 했다.
      <br/>String sql = "update countries set REGION_ID = 3  where country_id = 'KR'";<br/>
      위와 같이 써야 하는데 country_id = KR이라고 쓰고 ''를 안 붙여서 난 단순에러였다. 이것을 바꾸니 잘 작동했다.
       println을 써도 자꾸 줄바꿈이 안돼서 일일이 /n을 쳤는데 무엇이 문제였을까?

<h2>#참고할만한 내용</h2>
     특별히 없다.
<h2>#회고 (+-!)</h2>
+: 먼저 오라클에서 select * from locations;로 확인해보니 서울은 물론이고 한국도 없어서, 한국을 추가해보았다.<br/>
  이제 프린트나 참고자료를 보지 않아도 쿼리를 치는데 (자잘한 에러는 내지만)큰 문제가 없다.<br/> 쿼리로 데이터베이스를 다룬다는게 어떤건지도 좀 흐릿했던 초반에 비하면 정말 얻은게 많은 것 같아서 좋았다.<br/><br/>

-: catch문에서 받는 exception들의 사용법이 어렵다...<br/><br/>

!: 반복되는 코드들을 쓰면서 어떻게 하면 단축시킬 수 있을까 궁금했는데 배울 수 있어서 좋았다. println을 써도 줄바꿈이 안되고 print처럼 출력된다. 1학년때도 이런 일이 있었던 것 같아서 영 찝찝하다.<br/><br/>
    
    
<h2>#동작 화면 영상</h2>
<a href="https://youtu.be/S4Meuhcgteg">클릭</a>
