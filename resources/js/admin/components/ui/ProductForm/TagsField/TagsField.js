import { FormControl, InputLabel, MenuItem, Select } from '@mui/material';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { APIRoute } from '../../../../const';

function TagsField({ selectedTags }) {
  const [tags, setTags] = useState([]);
  const [tagIDs, setTagIDs] = useState(selectedTags?.map((tag) => tag.id) || []);

  useEffect(() => {
    axios.get(APIRoute.TAGS)
      .then(({ data }) => setTags(data));
  }, []);

  return (
    <FormControl fullWidth>
      <InputLabel id="tags">Теги</InputLabel>
      <Select
        labelId="tags"
        id="tag"
        value={tagIDs}
        name="tags"
        label="Теги"
        onChange={(evt) => setTagIDs(evt.target.value)}
        multiple
      >
        {tags?.map(({ id, title }) => (
          <MenuItem key={id} value={id}>{title}</MenuItem>
        ))}
      </Select>
    </FormControl >
  );
}

export default TagsField;
