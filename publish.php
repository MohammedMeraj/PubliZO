

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Publish : PubliZO</title>
</head>

<body>
  <form action="newPublished.php" method="post">
  <div class="publishBody">
    <div class="publishMenu" id="publishMenu">
      <div class="editMenuPanel">
        <div class="fontheadings ppms">
          <div class="selectedNormal" onclick="selectHead()" id="selectedNormal">
            Select Heading
            <div class="icon1">▼</div>
          </div>
          <div class="headingops" style="background-color: white" id="headingmenudrop">
            <button class="MajorHead hmen" id="mjrhd">Major Heading
            </button>
            <button class="Heading hmen" id="hdhd">Heading</button>
            <button class="MonorHead hmen" id="mnrhd">
              Minor Heading
            </button>
            <button class="normal hmen" id="nrmhd">Normal</button>
          </div>
        </div>
        <div class="font-size ppms">

          <input type="number" min="1" max="100" value="16" id="font-size" class="font-sizee ppms" /> Font Size

        </div>

        <div class="B-I-U ppms">
          <button class="bld lik pointer " id="b">B</button>
          <button class="itl lik pointer" id="i">i</button>
          <button class="undr lik pointer" id="u">U</button>
        </div>
        <div class="txtAlign ppms">
          <button class="left pointer" id="lft">Left</button>
          <button class="center pointer" id="cnt">Center</button>
          <dbutton class="right pointer" id="ght">Right</button>
        </div>
        <div class="font-color ppms "><input type="color" class="txtclr" id="txtclr">Font Color </div>
      </div>
      <button type="submit"  class="addNewPostBt" style="
            width: 7vw;
            height: 3vw;
            display: flex;
            align-items: center;
            justify-content: center;
          "   onclick="document.getElementById('hiddenContent').value = document.getElementById('txtArea').innerText;">
        Publish
      </button>
    </div>
    <div class="publishHeader">
      <input type="text" class="publishTittleBox" onclick="titleBOT()" id="publishTitleHead" name="title" placeholder="Title" required/>
    </div>
    <div class="publishPostBody">
      <input type="hidden" id="hiddenContent" name="content">
      <div type="text" contenteditable="true" class="publishEditBody" name="content" id="txtArea" for="mjrhd"></div>
    </div>
  </form>
  </div>

  <script src="pubScript.js"></script>
</body>

</html>