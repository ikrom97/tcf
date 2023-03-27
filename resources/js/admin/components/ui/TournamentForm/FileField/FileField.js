import { TextField, Typography } from '@mui/material';
import { useState } from 'react';
import style from './TextField.module.css';

function FileField(props) {
  const [file, setFile] = useState(props?.file || "Прикрепить файл")

  return (
    <>
      <label className={style.fileField} htmlFor="file">
        <TextField
          fullWidth
          label="Файл"
          defaultValue=" "
        />
        <Typography>{file}</Typography>
      </label>
      <input
        className="visually-hidden"
        id="file"
        type="file"
        name="file"
        onChange={(evt) => setFile(evt.target.files[0].name)}
      />
    </>
  );
}

export default FileField;
