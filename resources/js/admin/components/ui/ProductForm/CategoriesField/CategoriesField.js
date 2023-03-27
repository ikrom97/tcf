import { FormControl, InputLabel, MenuItem, Select } from '@mui/material';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { APIRoute } from '../../../../const';

function CategoriesField({ category }) {
  const [categories, setCategories] = useState([]);
  const [categoryID, setCategoryID] = useState(category);

  useEffect(() => {
    axios.get(APIRoute.CATEGORIES)
      .then(({ data }) => setCategories(data));
  }, [category]);


  return (
    <FormControl fullWidth>
      <InputLabel id="categories">Направление*</InputLabel>
      <Select
        labelId="categories"
        id="category"
        value={categoryID || ""}
        label="Направление*"
        name="category_id"
        onChange={(evt) => setCategoryID(evt.target.value)}
        required
      >
        {categories?.map(({ id, title }) => (
          <MenuItem key={id} value={id}>{title}</MenuItem>
        ))}
      </Select>
    </FormControl >
  );
}

export default CategoriesField;
