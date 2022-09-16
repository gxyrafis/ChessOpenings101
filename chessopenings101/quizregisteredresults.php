<html>
	<?php session_start();?>
	<head>
	<link rel="stylesheet" type="text/css"
		href="styles/main.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="refresh" content="1">
		<title>CO101 - Main</title>
		
        <script>
                var questions = JSON.parse(sessionStorage.getItem("questions"));
                var answers = JSON.parse(sessionStorage.getItem("answers"));
                var types = JSON.parse(sessionStorage.getItem("types"));
                var ans = [];

                var score = 0;
                var tmp = <?php echo json_encode(filter_input_array(INPUT_POST)); ?>;
                post = JSON.stringify(tmp);
                tmp = post.split(",");
                var userans = [];

                for(i = 0 ; i < 5 ; i++)
                {
                    ans.push("Στην ερώτηση: \"" + questions[i] + "\" απαντήσατε: <br><br>");
                    switch(types[i])
                    {
                        case "0":
                            
                            for(j = 0 ; j < tmp.length ; j++)
                            {
                                if(tmp[j].includes("radio" + i))
                                {
                                    break;
                                }
                            }
                            if (typeof tmp[j] === 'string')
                            {
                                userans = tmp[j].split(":");
                                userans[1] = userans[1].replaceAll('"', '');
                                userans[1] = userans[1].replaceAll('}', '');
                            

                                ans[i] += userans[1] + "<br>";
                                if(userans[1].toUpperCase() === answers[i].toUpperCase())
                                {
                                    score++;
                                    ans[i] += "Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>";
                                }
                                else
                                {
                                    ans[i] += "<br>Η σωστή απάντηση είναι: <br>" + answers[i] + "<br><br><br>";
                                }
                            }   
                            else
                            {
                                ans[i] += "" + "<br>" + "<br>Η σωστή απάντηση είναι: <br>" + answers[i] + "<br><br><br>";
                            }
                            break;

                        case "1":
                            for(j = 0 ; j < tmp.length ; j++)
                            {
                                if(tmp[j].includes("text" + i))
                                {
                                    break;
                                }
                            }
                            if (typeof tmp[j] === 'string')
                            {
                                userans = tmp[j].split(":");
                                userans[1] = userans[1].replaceAll('"', '');
                                userans[1] = userans[1].replaceAll('}', '');
                            

                                ans[i] += userans[1] + "<br>";
                                if(userans[1].toUpperCase() === answers[i].toUpperCase())
                                {
                                    score++;
                                    ans[i] += "Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>";
                                }
                                else
                                {
                                    ans[i] += "<br>Η σωστή απάντηση είναι: <br>" + answers[i] + "<br><br><br>";
                                }
                            }   
                            else
                            {
                                ans[i] += "" + "<br>" + "<br>Η σωστή απάντηση είναι: <br>" + answers[i] + "<br><br><br>";
                            }
                            break;

                        case "2":
                            if(answers[i].split('+').length-1 == 1)
                            {
                                for(j = 0 ; j < tmp.length ; j++)
                                {
                                    if(tmp[j].includes("radio" + i))
                                    {
                                        break;
                                    }
                                }
                                if (typeof tmp[j] === 'string')
                                {
                                    userans = tmp[j].split(":");
                                    userans[1] = userans[1].replaceAll('"', '');
                                    userans[1] = userans[1].replaceAll('}', '');
                                    correct = answers[i].split(",");
									var g;
                                    for(g = 0 ; g < correct.length ; g++)
                                    {
                                        if(correct[g].includes("+"))
                                        {
                                            break;
                                        }
                                    }
                                    correct[g] = correct[g].replace("+", "");

                                    ans[i] += userans[1] + "<br>";
                                    if(userans[1].toUpperCase() === correct[g].toUpperCase())
                                    {
                                        score++;
                                        ans[i] += "Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>";
                                    }
                                    else
                                    {
                                        ans[i] += "<br>Η σωστή απάντηση είναι: <br>" + correct[g] + "<br><br><br>";
                                    }
                                }   
                                else
                                {
									correct = answers[i].split(",");
									var g;
                                    for(g = 0 ; g < correct.length ; g++)
                                    {
                                        if(correct[g].includes("+"))
                                        {
                                            break;
                                        }
                                    }
                                    correct[g] = correct[g].replace("+", "");
                                    ans[i] += "" + "<br>" + "<br>Η σωστή απάντηση είναι: <br>" + correct[g] + "<br><br><br>";
                                }
                                break;

                            }
                            else if(answers[i].split('+').length-1 > 1)
                            {
								locations = [];
                                for(j = 0 ; j < tmp.length ; j++)
                                {
                                    if(tmp[j].includes("checkbox" + i))
                                    {
                                        locations.push(j);
                                    }
                                }

								if(typeof tmp[locations[0]] === 'string')
								{
									userans = [];
									correcttmp = answers[i].split(",");
									correctfinal = [];
									for(a = 0 ; a < locations.length ; a++)
									{
										userans[a] = tmp[locations[a]].split(":");
										userans[a][1] = userans[a][1].replaceAll('"', '');
										userans[a][1] = userans[a][1].replaceAll('}', '');
										ans[i] += " " + userans[a][1] + "<br>";
 									}
									for(b = 0 ; b < correcttmp.length ; b++)
									{
										if(correcttmp[b].includes("+"))
										{
											correctfinal.push(correcttmp[b]);
										}
									}
									for(b = 0 ; b < correctfinal.length ; b++)
									{
										correctfinal[b] = correctfinal[b].replace("+", "");
									}

									var flag = false;
									for(a = 0 ; a < userans.length ; a++)
									{
										flag = false;

										for(b = 0 ; b < correctfinal.length ; b++)
										{
											if(userans[a][1] === correctfinal[b])
											{
												flag = true;
											}
										}
										if(flag == false)
										{
											break;
										}
									}

									if(flag)
									{
										score++;
                                        ans[i] += "Η απάντηση είναι <p style=\"color:green\">Σωστή</p><br><br><br>";
									}
									else
									{
										ans[i] += "" + "<br>" + "<br>Η σωστή απάντηση είναι: <br>";
										for(a = 0 ; a < correctfinal.length ; a++)
										{
											ans[i] += correctfinal[a] + "<br>";
										}
										ans[i] += "<br><br><br>"
									}
								}
                            }
                            break;
                    }
                }
				sessionStorage.setItem("ans", JSON.stringify(ans));
				window.location.href="quizregisteredresultsfinal.php?score=" + score;
        </script>
	</head>
</html>