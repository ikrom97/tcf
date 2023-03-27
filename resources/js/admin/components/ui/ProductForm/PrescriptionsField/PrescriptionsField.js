import { FormControl, InputLabel, MenuItem, Select } from '@mui/material';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { APIRoute } from '../../../../const';

function PrescriptionsField({ prescription }) {
  const [prescriptions, setPrescriptions] = useState([]);
  const [prescriptionID, setPrescriptionID] = useState(prescription);

  useEffect(() => {
    axios.get(APIRoute.PRESCRIPTIONS)
      .then(({ data }) => setPrescriptions(data));
  }, []);


  return (
    <FormControl fullWidth>
      <InputLabel id="prescriptions">Рецептурность*</InputLabel>
      <Select
        labelId="prescriptions"
        id="prescription"
        value={prescriptionID || ""}
        name="prescription_id"
        label="Рецептурность*"
        onChange={(evt) => setPrescriptionID(evt.target.value)}
        required
      >
        {prescriptions?.map(({ id, title }) => (
          <MenuItem key={id} value={id}>{title}</MenuItem>
        ))}
      </Select>
    </FormControl>
  );
}

export default PrescriptionsField;
