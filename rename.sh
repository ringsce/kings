for file in *.html; do
   mv "${file}" "${file%.html}".php
done
