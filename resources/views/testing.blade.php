<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ini halaman testing</h1>
    <script>
        function dragstart_handler(ev) {
          // Add the target element's id to the data transfer object
          ev.dataTransfer.setData("application/my-app", ev.target.id);
          ev.dataTransfer.effectAllowed = "move";
        }
        function dragover_handler(ev) {
          ev.preventDefault();
          ev.dataTransfer.dropEffect = "move";
        }
        function drop_handler(ev) {
          ev.preventDefault();
          console.log(ev.target);
          // Get the id of the target and add the moved element to the target's DOM
          const data = ev.dataTransfer.getData("application/my-app");
        //   ev.target
            ev.target.parentNode.appendChild(document.getElementById(data));
        //   ev.target.appendChild(document.getElementById(data));
        }
      </script>

      <style>
        .list {
            background: green;
            height: 40px;
            width: auto;
            margin: 20px;
            padding: 10px;
        }
      </style>

      @for ($i = 0; $i < 5; $i++)
        <div class="list"
            id="target-{{ $i }}"
            ondrop="drop_handler(event)"
            ondragover="dragover_handler(event)">
            <p id="p-{{ $i }}" draggable="true" ondragstart="dragstart_handler(event)">
                This element is draggable - no {{ $i }}.
            </p>
        </div>  
      @endfor
      
</body>
</html>