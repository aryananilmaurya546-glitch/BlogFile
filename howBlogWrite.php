<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- favicon -->
        <link rel="shortcut icon" href="images/blogFile.png" type="image/x-icon">
        
        <link rel="stylesheet" href="css/style.css">
        <title>BlogFile - How to use Blog</title>

    </head>
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
    <body>
        <?php include 'partials/_dbconnect.php'; ?>
        
        <?php include 'partials/_navbar.php'; ?>

        <div class="container">
            <div class="informationTable">
                <table style='width: 100%; height: 11vh;' class='my-5 mx-5'>
                    <tr>
                        <th>Sr.no</th>
                        <th>Tag</th>
                        <th>Description</th>
                        <th>How to use?</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>&lt;h1&gt; This is a heading tag &lt;/h1&gt;</td>
                        <td>H1 tag is use for the heading, you can set some text in the heading tag</td>
                        <td>
                            <h1> Heading this is a text </h1>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>&lt;h2&gt; This is a small text &lt;/h2&gt;</td>
                        <td>H2 tag is use for the heading, but it is smaller than the h1 you can set some text in the heading tag</td>
                        <td>
                            <h2> This is a smaller text </h2>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>&lt;h3&gt; This is a smaller than the h2 &lt;/h3&gt;</td>
                        <td>H3 tag is use for the heading, it is smaller than the h2 tag you can set some text in the heading tag</td>
                        <td>
                            <h3> Heading this is a text </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>&lt;p&gt; This is a paragraph &lt;/p&gt;</td>
                        <td>p tag is use for make an paragraph</td>
                        <td>
                            <p> This is a paragraph </p>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>&lt;b&gt; it is use for bold a text &lt;/b&gt;</td>
                        <td>b tag use for blod a text</td>
                        <td>
                            <b> I am a bold </b>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>&lt;i&gt; i am from italy &lt;/i&gt;</td>
                        <td>It is use for make an text italic </td>
                        <td>
                            <i> I am an italian </i>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>&lt;u&gt; i am an underline &lt;/u&gt;</td>
                        <td>It use for make an text underlined </td>
                        <td>
                            <u> I am underline </u>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>&lt;a href="https://www.google.com"&gt; I am a link &lt;/a&gt;</td>
                        <td>It is use for make an link and one more thing where I have written the path of google there you want to set an path like file or site </td>
                        <td>
                            <a href="https://www.google.com"> I am going to google </a>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>
                            <pre>
                                &lt;ul&gt;
                                    &lt;li&gt; i use to create an unorder list &lt;/li&gt; 
                                &lt;/ul&gt;
                            </pre>
                        </td>
                        <td>It is use for create an unorder list, in the ul you want to create an li in that you write the text and unorder mean there will be a dot</td>
                        <td>
                            <ul>
                                <li>Hello</li>
                                <li>2 hello</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>
                            <pre>
                                &lt;ol&gt;
                                    &lt;li&gt; i use to create an order list &lt;/li&gt; 
                                &lt;/ol&gt;
                            </pre>
                        </td>
                        <td>It is use for create an order list, in the ol you want to create an li in that you write the text and order mean there will be a nummber</td>
                        <td>
                            <ol>
                                <li>Hello</li>
                                <li>hello</li>
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>
                            <pre>
                                &lt;ol&gt; 
                                    &lt;li&gt;I am in the order list &lt;/li&gt; 
                                    &lt;ul&gt;
                                        &lt;li&gt; I am in the unorder list &lt;/li&gt; 
                                    &lt;/ul&gt;
                                &lt;/ol&gt;
                            </pre>
                        </td>
                        <td>You can also create an nested list just you can use ablove example</td>
                        <td>
                            <ol>
                                <li>Hello</li>
                                <li>hello</li>
                                <ul>
                                    <li>I am unorder</li>
                                    <li>list</li>
                                </ul>
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>&lt;img src="this is path"&gt;</td>
                        <td>Where I have written the 'this is path' there you want to set an image path</td>
                        <td>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Gull_portrait_ca_usa.jpg/300px-Gull_portrait_ca_usa.jpg" alt="fd">
                        </td>
                    </tr>

                </table>
            </div>
        </div>

        <?php include 'partials/_footer.php'; ?>


        <!-- javaScript -->
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>