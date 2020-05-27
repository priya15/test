var i=0;
	$(document).ready(function(){
	$("#addnew").click(function(){
      i++;
      $(".addques").append("<div id=ques_"+i+"><input type=text class='question form-control' placeholder='Add Question' required><select class='questype form-control' target="+i+"><option value=''>Select AnswerType</option><option value=1>Multilinetext</option><option value=2>singlechoice</option><option value=3>Multichoice</option></select><input type=button class='canclebtn btn btn-danger' value=Cancel target="+i+"></div>");
	});	
	/*cancle activity*/
	$("#cancle").click(function(){
		$(".addques").empty();
		i=0;
	});

	$(".close").click(function(){
		$(".addques").empty();
		i=0;
	});
	/*end*/

	/*Add answer choosing user answertype*/

		$(document).on('change', '.questype', function(){
		var target = $(this).attr("target");
		var quesval = $(this).find(":selected").val();
		$("#ans"+target+"").remove();
		$(".subque"+target+"").remove();
		if (quesval == "") {
			alert("select value for answer");
		}
		if (quesval == 1) {
          		$("#ques_"+target+"").append("<div id=ans"+target+"><textarea class='answer_"+target+" form-control anstext' placeholder='Enter Answer'></textarea></div><div class=subque"+target+"><input type=button class='subquesbtn btn btn-default' target="+target+" value='Add Sub Question'><input type=hidden value=no class=subquesval id=subquesvals_"+target+"></div>");

		}
		if (quesval == 2) {
           	$("#ques_"+target+"").append("<div id=ans"+target+"><input type=text class='answer_"+target+" form-control anstext' placeholder='Enter Answer'><br><input type=text class='answer_"+target+" form-control anstext' placeholder='Enter Answer'></div><div class=subque"+target+"><input type=button class='subquesbtn  btn btn-default' target="+target+" value='Add Sub Question'><input type=hidden value=no id=subquesvals_"+target+" class=subquesval></div>");			
		}
		if (quesval == 3) {
				$("#ques_"+target+"").append("<div id=ans"+target+"><input type=text class='answer_"+target+" form-control anstext' placeholder='Enter Answer'><br><input type=text class='answer_"+target+" form-control anstext' placeholder='Enter Answer'><br><input type=text class='answer_"+target+" form-control anstext' placeholder='Enter Answer'></div><div class=subque"+target+"><input type=button class='subquesbtn btn btn-default' target="+target+" value='Add Sub Question'><input type=hidden value=no id=subquesvals_"+target+" class=subquesval></div>");
		}
		console.log(quesval);
      });

	/*end*/


	/*Add subquestion textfiled*/
	$(document).on('click', '.subquesbtn', function(){
		var subquestarget = $(this).attr("target");
        $("#subquesvals_"+subquestarget+"").remove();
        $(".subque"+subquestarget+"").append("<input type=text  id=subquesvals_"+subquestarget+" class='subquesval form-control' placeholder='Enter Sub Question'>");
    });
    /*end*/

    /*Activity on cancle button*/
	$(document).on('click', '.canclebtn', function(){

	  	var cantarget = $(this).attr("target");
	  	console.log(cantarget);
	    $("#ques_"+cantarget+"").remove();
	    i--;
	  })
	/*end*/

    /*Data save to db*/
	$("#save").click(function(){
		//console.log($(".question").val());
		//console.log($(".answer").val());
		var typearr = new Array();
		var quesarr = new Array();
		var ansarr  = new Array();
		var subquesval = new Array();
        var count = 0;
		var data = new FormData();    

		/*code for add answer*/

		for(var j=1;j<=(i);j++)
		{
			var ansval  = "ans"+j+"";
			var ansname = "ans"+j+"";
			var ansval = new Array();
           $(".answer_"+j+"").each(function(){
           	ansval.push($(this).val());
           if($(this).val()=="") {
				count++;
			}
            data.append(ansname,ansval);
           })
		}

		/*end*/

       $(".question").each(function(){
			quesarr.push($(this).val());
			if($(this).val()=="") {
				count++;
			}
		})
		$(".questype").each(function(){
			typearr.push($(this).find(":selected").val());
		})
        $(".subquesval").each(function(){
			subquesval.push($(this).val());
		})
		data.append("question",quesarr);
		data.append("type",typearr);
		data.append("i",i);
		data.append("subquesval",subquesval);
        if ((count == 0)&&(i!=0)) {
        $.ajax({
		  url: 'addquestion.php',
		  data: data,
		  processData: false,
		  contentType: false,
		  type: 'POST',
		  success: function(data){
		    console.log(data);
		    if (data == 0) {
		    	$("#myModal").modal("hide");
		    	$(".addques").empty();
		    	i=0;
		    	alert("Data added successfully");
		    }
		  }
		});
    }
    else
    {
    	alert("Please enter all questions and answer in fileds");
    }
	})
	/*end*/


	})
