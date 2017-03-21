var thread_id = [];
//index 0 - gif animation
//index 1 - blinking animation

function gifanim(m_id){	
	$(".gifanim").attr("src","");
	var source = "";
	switch(id){
		case 1:
			source = "img/GIFS/DustII/";
			break;
		case 2:
			source = "img/GIFS/Inferno/";
			break;
		case 3:
			source = "img/GIFS/";
			break;
	}
	var img = source+m_id+".gif";
	$(".gifanim").attr("src",img);
	
	thread_id[0] = setInterval(function(){
		img = img.replace(/\?.*$/,"")+"?x="+Math.random();;
		$(".gifanim").attr("src",img);
	},smokes[m_id-1].duration);
}

function loadsmoke(){
	for(var i=0; i<smokes.length; i++){
		if(id == smokes[i].map_id){
			$(".mapprop").append("<div class='point' id='p"+(i+1)+"'></div>");
			$(".mapprop").append("<div class='target' id='t"+(i+1)+"'><span class='glyphicon glyphicon-remove'></span></div>");
			$("#p"+(i+1)).css("top",smokes[i].y).css("left",smokes[i].x);
			$("#t"+(i+1)).css("top",smokes[i].t_y).css("left",smokes[i].t_x);
		}
		$(".target").hide();
	}
	
}

function blink(selector){
	thread_id[1] = setInterval(function(){
		$(selector).fadeIn(200, function(){
			$(selector).fadeOut(200);
		});
	},200);
}

function initanim(){
	$(".mapnav").fadeOut(2000);
	$(".point").fadeOut(200);
	$(".point").delay(200).fadeIn(200);
	$(".point").delay(200).fadeOut(200);
	$(".point").delay(200).fadeIn(200);
	$(".point").delay(200).fadeOut(200);
	$(".point").delay(200).fadeIn(200);
}

$(document).ready(function(){
	loadsmoke();
	initanim();
	
	$(".gifanim").hide();
	$(".prev > .mapnav").on("click", function(){
		id -= 1;
		if(id == 0){
			id = 3;
		}
		window.location.href = "map.php?id="+id;
	});
	
	$(".next > .mapnav").on("click", function(){
		id += 1;
		if(id == 4){
			id = 1;
		}
		window.location.href = "map.php?id="+id;
	});
	
	$(".arrow").mouseenter(function(){
		$(this).children().fadeIn(100);
	});
	
	$(".arrow").mouseleave(function(){
		$(this).children().fadeOut(100);
	});
	
	var pid;
	$(".point").mouseenter(function(){
		$(this).css("border-color","white");
		$(".cap").hide();
		$(".vid").css("border","0.1em solid white");
		$(".gifanim").show();
		
		pid = $(this).attr("id");
		$("#t"+pid[1]).show();
		blink($("#t"+pid[1]));
		gifanim(pid[1]);
	});
	
	$(".point").mouseleave(function(){
		clearInterval(thread_id[1]);
		$("#t"+pid[1]).hide();
		$(this).css("border-color","yellow");
		$(".vid").css("border","0.1em dashed white");
		$(".cap").show();
		clearInterval(thread_id[0]);
		$(".gifanim").hide();
		$(".gifanim").attr("src","");
	});
});