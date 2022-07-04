<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset=UTF-8>
    <title>Test</title>
  </head>
  <body>
    <form>
      @csrf
      <input type="hidden" name="_method" value="put">
      <input type="text" name="media[]" value="1">
      <input type="text" name="media[]" value="2">
      <input type="file" name="media[]">
      <button type="submit">Submit</button>
    </form>
    <pre id="result"></pre>
    <script>
      document.querySelector('form').addEventListener('submit', (e) => {
        const body = new FormData(e.target);
        e.preventDefault();
        fetch('/test', {
          method: 'post',
          credentials: 'same-origin',
          headers: {
            accept: 'application/json'
          },
          body,
        })
          .then(result => result.json())
          .then(result => document.querySelector('#result').innerHTML = JSON.stringify(result, null, 2));
      });
    </script>
  </body>
</html>